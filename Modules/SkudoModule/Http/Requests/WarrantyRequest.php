<?php

namespace Modules\SkudoModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\SkudoModule\Http\Services\WarrantyService;

class WarrantyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param WarrantyService $warrantyService
     * @return array
     */
    public function rules(WarrantyService $warrantyService): array
    {
        switch ($this->method()) {
            case 'POST':
                return $warrantyService->getRules($this->get('type'));
            default:
                return $warrantyService->getUpdateRules($this->get('type'));
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
