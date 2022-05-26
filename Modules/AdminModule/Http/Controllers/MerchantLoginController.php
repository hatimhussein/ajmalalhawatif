<?php

namespace Modules\AdminModule\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\AdminModule\Repository\MerchantRepository;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\UserModule\Notifications\UserRegisterNotification;

class MerchantLoginController extends Controller
{
    use ApiResponseHelper;
    use UploaderHelper;

    private MerchantRepository $merchantRepository;

    public function __construct(MerchantRepository $merchantRepository)
    {
        $this->merchantRepository = $merchantRepository;
    }

    public function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|min:3',
            'authorized_person' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'required|numeric|digits_between:9,14|unique:users,phone',
            'password' => 'min:6',
//            'confirm' => 'required_with:password_confirmation|same:password_confirmation',
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->setCode(201)->setError($validator->errors()->first())->send();
        }

        try {
            $data = $request->except('_token');

            $data['logo'] = null;

            if ($this->merchantRepository->doRegister($data)) {

                return $this->setCode(200)->setSuccess(__('commonmodule::validation.merchant_saved'))->send();
            } else {
                return $this->setCode(201)->setError(__('commonmodule::validation.register_error'))->send();
            }
        } catch (Exception $e) {
            return $this->setCode(201)->setError($e->getMessage())->send();
        }
    }

    public function doLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = $request->except('_token');
        if ($this->merchantRepository->doLogin($data)) {
            return $this->setCode(200)->setSuccess('succes Login')->send();
        } else {
            return $this->setCode(201)->setError(__('commonmodule::validation.login_error'))->send();
        }
    }
}
