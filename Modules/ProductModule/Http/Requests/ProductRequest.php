<?php

namespace Modules\ProductModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name_ar' => 'required',
                    'name_en' => 'required',
                    // 'desc_ar'=>'required',
                    // 'desc_en'=>'required',
                    'parent_id' => 'required',
                    'product_code' => 'required',
                    'product_price' => 'required|numeric',
                    // 'product_quantity'=>'nullable|numeric',
                    'product_photo' => 'required|image|mimes:jpeg,png,jpg,gif',
                    'product_images.*' => 'required|image|mimes:jpeg,png,jpg,gif',
                    'video' => 'mimetypes:video/mp4',
                    'sort' => 'required|numeric|min:0',
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'name_ar' => 'required',
                    'name_en' => 'required',
                    // 'desc_ar'=>'required',
                    // 'desc_en'=>'required',
                    'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'parent_id' => 'required',
                    'video' => 'mimetypes:video/mp4',
                ];
            }
            default:
                break;
        }

    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
