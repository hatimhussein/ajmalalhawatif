<?php
/**
 * Created by PhpStorm.
 * User: Ballast
 * Date: 14/01/18
 * Time: 09:25 م
 */

namespace Modules\CommonModule\Helper;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

trait ApiResponseHelper
{

    /**
     * @var array
     */
    protected array $body;


    /**
     * Set response data.
     *
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->body['data'] = $data;
        return $this;
    }


    public function setError($error)
    {
        $this->body['status'] = 'error';
        $this->body['message'] = $error;
        return $this;
    }

    public function setSuccess($message)
    {
        $this->body['status'] = 'success';
        $this->body['message'] = $message;
        return $this;
    }

    public function setCode($code)
    {
        $this->body['code'] = $code;
        return $this;
    }


    public function send()
    {
        return response()->json($this->body);

    }

    public function prepareErrorResult()
    {
        return $this->makeAuthenticationCookie([
            'error' => 'هذا الاكونت غير موجود تأكد من انه يحتوى على ايميل !',
            'redirect' => '/login',
            'code' => 401
        ]);
    }

    public function prepareSuccessResult(User $user)
    {
        return $this->makeAuthenticationCookie([
            'user_id' => $user->id,
            'redirect_url' => '/'
        ]);
    }


    public function sendCollection($collection, $code)
    {
        return response()->json($collection, 200);
    }

    public function validate($inputs, $rules): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($inputs, $rules);
    }


}
