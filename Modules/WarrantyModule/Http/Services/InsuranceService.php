<?php


namespace Modules\WarrantyModule\Http\Services;


use App\Rules\FullName;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\WarrantyModule\Repository\InsuranceRepository;

class InsuranceService
{
    use UploaderHelper;

    private InsuranceRepository $insuranceRepository;
    private ConfigRepository $configRepository;

    public function __construct(InsuranceRepository $insuranceRepository,
                                ConfigRepository    $configRepository)
    {
        $this->insuranceRepository = $insuranceRepository;
        $this->configRepository = $configRepository;
    }

    public function getSearch($keyword, $user_id = null)
    {
        return $keyword
            ? $this->insuranceRepository->searchQuery($keyword)
                ->where('user_id', $user_id)
                ->get()
            : $this->insuranceRepository->get(['user_id' => $user_id])->sortByDesc('id');
    }

    public function getEnabledConfigs(): Collection
    {
        return $this->configRepository->getConfigByCategoryKey('insurance')
            ->where('value_ar', 1);
    }


    public function addCompanyInputs(Collection $inputs): Collection
    {
        $inputs->push($this->configRepository->object()->forceFill([
            'key' => 'company_name',
            'properties' => [
                'type' => 'text'
            ]
        ]));

        $inputs->push($this->configRepository->object()->forceFill([
            'key' => 'company_account',
            'properties' => [
                'type' => 'text'
            ]
        ]));

        return $inputs;
    }

    public function getRules(): array
    {
        $inputs = $this->getEnabledConfigs();

        $rules = $this->getEnabledRules($inputs);

        return $this->getCustomRules($rules);
    }


    public function getEnabledRules($inputs): array
    {
        $rules = array();
        foreach ($inputs as $input) {
            $rules[$input->key] = array();

            if ($input->value_en == 1) {
                $rules[$input->key][] = 'required';
            } else {
                $rules[$input->key][] = 'nullable';
            }

            if ($input->properties['type'] == 'file') {
                $rules[$input->key][] = 'mimes:jpeg,png,jpg,mp4,qt,mov';
            }
        }
        return $rules;
    }


    public function getUpdateRules(): array
    {
        $inputs = $this->getEnabledConfigs();

        $rules = $this->getEnabledUpdateRules($inputs);

        return $this->getCustomRules($rules);
    }

    public function getEnabledUpdateRules($inputs): array
    {
        $rules = array();
        foreach ($inputs as $input) {
            $rules[$input->key] = array();

            if ($input->properties['type'] == 'file') {
                $rules[$input->key][] = 'nullable';
                $rules[$input->key][] = 'mimes:jpeg,png,jpg,mp4,qt,mov';
            } else {
                if ($input->value_en == 1) {
                    $rules[$input->key][] = 'required';
                } else {
                    $rules[$input->key][] = 'nullable';
                }
            }
        }
        return $rules;
    }

    public function getCustomRules($rules): array
    {
        $rules = $this->getGeneralCustomRules($rules);

        if (isset($rules['install_date'])) {
            $rules['install_date'][] = 'date';
        }

        if (isset($rules['install_price'])) {
            $rules['install_price'][] = 'numeric';
            $rules['install_price'][] = 'min:0';
        }

        $rules['terms'] = ['required'];

        return $rules;
    }

    public function getGeneralCustomRules($rules)
    {
        if (isset($rules['user_name'])) {
            $rules['user_name'][] = new FullName();
        }

        if (isset($rules['phone'])) {
            $rules['phone_code_id'] = [
                'required_with:phone',
                'exists:phone_codes,id'
            ];

            if (isset($rules['phone'][0]) && $rules['phone'][0] == 'required') {
                $rules['phone'][] = 'numeric';
                $rules['phone'][] = 'digits_between:9,14';
            }
        }

        if (isset($rules['email'])) {
            $rules['email'][] = 'email';
        }

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

}
