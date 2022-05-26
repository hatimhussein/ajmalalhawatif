<?php

namespace Modules\ProductModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

      switch($this->method())
{
    case 'GET':
    case 'DELETE':
        {
            return [];
        }
    case 'POST':
        {
          return [
                'name_ar'=>'required',
                'name_en'=>'required',
                'desc_ar'=>'required',
                'desc_en'=>'required',
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif',
          ];
        }
    case 'PATCH':
    case 'PUT':
        {
          return [
                'name_ar'=>'required',
                'name_en'=>'required',
                'desc_ar'=>'required',
                'desc_en'=>'required',
                'photo'=>'image|mimes:jpeg,png,jpg,gif',
          ];
        }
    default:break;
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
