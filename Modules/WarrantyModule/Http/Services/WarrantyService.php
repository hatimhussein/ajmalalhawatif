<?php


namespace Modules\WarrantyModule\Http\Services;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\WarrantyModule\Entities\Insurance;
use Modules\WarrantyModule\Repository\WarrantyRepository;

class WarrantyService
{
    use UploaderHelper;

    private WarrantyRepository $warrantyRepository;
    private ConfigRepository $configRepository;
    private InsuranceService $insuranceService;
    public Collection $configs;

    public function __construct(WarrantyRepository $warrantyRepository,
                                ConfigRepository   $configRepository,
                                InsuranceService   $insuranceService)
    {
        $this->warrantyRepository = $warrantyRepository;
        $this->configRepository = $configRepository;
        $this->insuranceService = $insuranceService;
    }

    public function checkEnabled(): void
    {
//        $this->configs = $this->configRepository->getConfigByCategoryKey('warranty');
//        $warranty = $this->configs->where('key', 'warranty')->first();

        if (!auth()->user()->is_merchant) {
            abort(404);
        }

//        if ((auth()->user()->is_merchant && !$warranty->value_en) || (!auth()->user()->is_merchant && !$warranty->value_ar)) {
//            abort(404);
//        }
    }

    public function getEnabledInputs($type): Collection
    {
        $categoryKey = $type == 'sms' ? 'sms_warranty' : 'warranty';

        if (!isset($this->configs)) {
            $this->configs = $this->configRepository->getConfigByCategoryKey($categoryKey);
        }

        return $this->configs->where('value_ar', 1);

//        return $inputs->filter(function ($input) use ($type) {
//            if ($type == 'sms') {
//                return false !== stristr($input->photo, 'sms');
//            } else {
//                return false !== stristr($input->photo, 'card');
//            }
//        });
    }

    public function addInsuranceNumberInput(Collection $inputs): Collection
    {
        $inputs->push($this->configRepository->object()->forceFill([
            'key' => 'sent_at',
            'properties' => [
                'type' => 'date'
            ]
        ]));

        return $inputs->push($this->configRepository->object()->forceFill([
            'key' => 'warranty_number',
            'properties' => [
                'type' => 'text'
            ]
        ]));
    }

    public function addCompanyInputs(Collection $inputs): Collection
    {
        return $this->insuranceService->addCompanyInputs($inputs);
    }

    public function getRules($type): array
    {
        $inputs = $this->getEnabledInputs($type);

        $rules = $this->insuranceService->getEnabledRules($inputs);

        return $this->getCustomRules($rules);
    }

    public function getUpdateRules($type): array
    {
        $inputs = $this->getEnabledInputs($type);

        $rules = $this->insuranceService->getEnabledUpdateRules($inputs);

        return $this->getCustomRules($rules);
    }

    public function getCustomRules($rules): array
    {
        $rules = $this->insuranceService->getGeneralCustomRules($rules);

        if (isset($rules['usage_date'])) {
            $rules['usage_date'][] = 'date';
        }

        $rules['type'] = ['nullable', 'in:sms,card'];

        return $rules;
    }

    public function uploadFiles($data)
    {
        $files = ['front_image', 'back_image', 'warranty_image'];
        foreach ($files as $file) {
            if (isset($data[$file]) && !empty($data[$file]))
                $data[$file] = $this->uploadVideo($data[$file], 'warranty');
        }
        return $data;
    }

    public function fillWarrantyDataByInsurance(array $data, Model $insurance): array
    {
        $data = array_merge($data, $insurance->only(['user_name', 'phone', 'phone_code_id', 'usage_date']));
        $data['insurance_id'] = $insurance->id;
        return $data;
    }
}
