<?php

namespace Modules\AdminModule\Repository;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\AdminModule\Entities\Merchant;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Notifications\MerchantActiveNotification;
use Modules\WarrantyModule\Repository\BaseRepository;

class MerchantRepository extends BaseRepository
{

    public function model(): string
    {
        return User::class;
    }

    function doLogin($credentials)
    {

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'is_active' => '1', 'is_ban' => '0', 'is_merchant' => '1']))
            return true;
        return false;


    }


    function create($data)
    {
        $data['is_merchant'] = 1;
        return User::create($data);
    }


    function doRegister($data)
    {
        $data['is_merchant'] = 1;
        $data['prices_level'] = null;
        $user = User::create($data);
        return $user;
    }

    function getMerchants()
    {
        return User::where('is_merchant', 1)->orderBy('id', 'desc')->get();
    }

    function getMerchant($id)
    {
        return User::find($id);
    }

    function findMerchantById($id)
    {
        return User::where('id', $id)->where('is_merchant', 1)->first();
    }

    function updateMerchant($merchant, $data)
    {
        return $merchant->update($data);
    }

    function getNewCount()
    {
        return User::where('is_active', 0)->where('is_merchant', 1)->where('account_number', null)->count();
    }

    function sendActivateNotification($merchant)
    {
        try {
            $merchant->notify(new MerchantActiveNotification());
        } catch (Exception $e) {
//                        yikes
        }
    }


    public function bulkStatus($ids, $status)
    {
        return User::whereIn('id', $ids)->where('is_merchant', 1)->update(['is_active' => !$status]);
    }


    public function bulkCash($ids, $status)
    {
        return User::whereIn('id', $ids)->where('is_merchant', 1)->update(['can_cash' => $status]);
    }
}
