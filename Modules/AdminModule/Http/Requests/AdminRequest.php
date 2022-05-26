<?php

namespace Modules\AdminModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
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
                    'name' => 'required',
                    'username' => 'required|unique:admins',
                    'email' => 'required|email|unique:admins',
                    'password' => 'required|min:6',
                    'phone' => 'required|unique:admins',
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'name' => 'required',
                    'username' => 'required|unique:admins,username,' . $this->request->get('id'),
                    'email' => 'required|email|unique:admins,email,' . $this->request->get('id'),
                    'phone' => 'required|unique:admins,phone,' . $this->request->get('id')
                ];
            }
            default:
                return [];
                break;
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
