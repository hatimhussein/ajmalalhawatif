<?php

namespace Modules\UserModule\Repository;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\OrderModule\Entities\Order;
use ValidateRequests;

use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;
use Modules\UserModule\Entities\ResetPassword;
use Modules\UserModule\Entities\VerificationCode;
use Modules\UserModule\Entities\Suggestion;
use Modules\UserModule\Entities\Newsletter;
use Modules\UserModule\Entities\Contactus;
use Modules\UserModule\Entities\UserLog;
use Modules\UserModule\Emails\ActivationMail;
use Modules\UserModule\Emails\ResetPasswordMail;
use Session;
use Mail;


use Auth;

class UserLogRepository
{

    function saveUserLog($user)
    {
        $log = $this->getUserLog($user->id);
        if ($log) {
            $this->incrementLog($log);
        } else {
            $this->addNewUserLog($user);
        }
    }

    function getUserLog($id)
    {
        return UserLog::where('user_id', $id)->whereDate('created_at', Carbon::now())->orderBy('id', 'desc')->first();
    }

    function incrementLog($log)
    {
        $log->count++;
        $log->save();
    }

    function addNewUserLog($user)
    {
        UserLog::create([
            'user_id' => $user->id,
            'is_merchant' => $user->is_merchant,
            'count' => 1,
        ]);
    }


    function findAllUsers()
    {
        $date = date("Y-m-d");
        return UserLog::where('is_merchant', 0)->where('created_at', '=', $date)->get();

    }

    function findAllMerchants()
    {
        $date = date("Y-m-d");
        return UserLog::where('is_merchant', 1)->where('created_at', '=', $date)->get();
    }


}
