<?php


namespace Modules\SkudoModule\Http\Services;


use App\Rules\FullName;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\SkudoModule\Repository\InsuranceRepository;

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
        if ($keyword !== null && $keyword !== '') {
            // Search strictly by registration id (skudo_insurances.id)
            $query = $this->insuranceRepository->query()->where('id', (int) $keyword);
            return $query->get();
        }
        // No keyword: return empty collection (index should handle empty state)
        return collect();
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

        $rules = $this->getCustomRules($rules);

        // Align with current insurance create page: do not require fields not present
        $this->forceNullable($rules, 'warranty_image');
        $this->forceNullable($rules, 'device_name');
        $this->forceNullable($rules, 'dummy_text_2');

        // Finally, align all rules to only validate fields present on the request
        $rules = $this->alignRulesWithRequest($rules);

        return $rules;
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
        // Skip strict full name rule on insurance forms to match page expectations
        if (isset($rules['user_name']) && !request()->routeIs('front.skudo.insurance.*')) {
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

    private function forceNullable(array & $rules, string $key): void
    {
        if (!isset($rules[$key])) {
            return;
        }
        // Remove any 'required' entries
        $rules[$key] = array_values(array_filter($rules[$key], function ($rule) {
            return !(is_string($rule) && $rule === 'required');
        }));
        // Ensure 'nullable' is present
        if (!in_array('nullable', $rules[$key], true)) {
            $rules[$key][] = 'nullable';
        }
    }

    private function alignRulesWithRequest(array $rules): array
    {
        $request = request();
        foreach ($rules as $key => $ruleSet) {
            $hasValue = $request->has($key) || $request->hasFile($key);
            if ($hasValue) {
                continue;
            }
            // Remove any 'required' entry and ensure nullable is present
            $ruleSet = array_values(array_filter($ruleSet, function ($rule) {
                return !(is_string($rule) && $rule === 'required');
            }));
            if (!in_array('nullable', $ruleSet, true)) {
                $ruleSet[] = 'nullable';
            }
            $rules[$key] = $ruleSet;
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
