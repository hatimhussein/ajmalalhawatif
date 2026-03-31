<?php

namespace Modules\SkudoModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SerialNumberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'item_number' => 'nullable|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'product_name_ar' => 'nullable|string|max:255',
            'product_name_en' => 'nullable|string|max:255',
            'product_serial' => 'nullable|string|max:255',
        ];

        // For update, make product_serial unique except for current record
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['product_serial'] = 'nullable|string|max:255|unique:serial_numbers,product_serial,' . $this->route('serial_number');
        } else {
            $rules['product_serial'] = 'nullable|string|max:255|unique:serial_numbers,product_serial';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'item_number.max' => 'رقم الصنف يجب أن يكون أقل من 255 حرف',
            'barcode.max' => 'الباركود يجب أن يكون أقل من 255 حرف',
            'product_name_ar.max' => 'اسم الصنف العربي يجب أن يكون أقل من 255 حرف',
            'product_name_en.max' => 'اسم الصنف الإنجليزي يجب أن يكون أقل من 255 حرف',
            'product_serial.max' => 'الرقم التسلسلي يجب أن يكون أقل من 255 حرف',
            'product_serial.unique' => 'الرقم التسلسلي موجود مسبقاً',
        ];
    }
}
