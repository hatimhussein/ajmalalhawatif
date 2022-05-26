<?php

namespace Modules\WarrantyModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\WarrantyModule\Http\Services\InsuranceService;

class InsuranceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param InsuranceService $insuranceService
     * @return array
     */
    public function rules(InsuranceService $insuranceService): array
    {
        switch ($this->method()) {
            case 'POST':
                return $insuranceService->getRules();
            default:
                return $insuranceService->getUpdateRules();
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
