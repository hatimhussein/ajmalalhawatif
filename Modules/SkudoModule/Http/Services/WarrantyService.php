<?php


namespace Modules\SkudoModule\Http\Services;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\SkudoModule\Entities\Insurance;
use Modules\SkudoModule\Repository\WarrantyRepository;
use Modules\SkudoModule\Http\Services\InsuranceService;

class WarrantyService
{
    use UploaderHelper;

    private $warrantyRepository;
    private $configRepository;
    private $insuranceService;
    public $configs;

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

        // For guests, allow access to warranty features
        if (auth()->check() && !auth()->user()->is_merchant) {
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

        $inputs->push($this->configRepository->object()->forceFill([
            'key' => 'device_serial',
            'properties' => [
                'type' => 'text'
            ]
        ]));

        $inputs->push($this->configRepository->object()->forceFill([
            'key' => 'package_serial',
            'properties' => [
                'type' => 'text'
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
        
        // إزالة قواعد التحقق لـ front_image لأننا نستخدم broken_device_image بدلاً منه
        if (isset($rules['front_image'])) {
            unset($rules['front_image']);
        }
        
        // إضافة قواعد التحقق لصورة الجهاز المكسور
        $rules['broken_device_image'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
        
        // إضافة قواعد التحقق للبيانات البنكية
        $rules['bank_name'] = ['required', 'string', 'max:255'];
        $rules['account_holder_name'] = ['required', 'string', 'max:255'];
        $rules['bank_account_number'] = ['required', 'string', 'max:50'];
        $rules['iban_number'] = ['required', 'string', 'max:50'];
        
        // إضافة قواعد التحقق لحالة التحويل وملف الإيصال
        $rules['transfer_status'] = ['nullable', 'in:0,1'];
        $rules['transfer_receipt'] = ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120']; // 5MB max

        return $rules;
    }

    public function uploadFiles($data)
    {
        $files = ['back_image', 'warranty_image', 'broken_device_image', 'transfer_receipt'];
        foreach ($files as $file) {
            if (isset($data[$file]) && !empty($data[$file]))
                $data[$file] = $this->uploadVideo($data[$file], 'warranty');
        }
        return $data;
    }

    public function fillWarrantyDataByInsurance(array $data, Model $insurance): array
    {
        $data = array_merge($data, $insurance->only(['user_name', 'phone', 'phone_code_id', 'usage_date', 'device_serial', 'package_serial']));
        $data['insurance_id'] = $insurance->id;
        return $data;
    }
}
