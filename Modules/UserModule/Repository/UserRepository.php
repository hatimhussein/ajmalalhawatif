<?php

namespace Modules\UserModule\Repository;

use Carbon\Carbon;
use Exception;
use Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Entities\NotificationBody;
use Modules\OrderModule\Entities\Order;
use Modules\UserModule\Entities\PhoneCode;
use Modules\UserModule\Entities\SuggesstionReply;
use Modules\UserModule\Notifications\ForgotPasswordNotification;
use Modules\UserModule\Notifications\UserLoginNotification;

use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;
use Modules\UserModule\Entities\ResetPassword;
use Modules\UserModule\Entities\VerificationCode;
use Modules\UserModule\Entities\Suggestion;
use Modules\UserModule\Entities\Newsletter;
use Modules\UserModule\Entities\Contactus;
use Modules\UserModule\Emails\ActivationMail;
use Modules\WarrantyModule\Repository\BaseRepository;
use Session;
use Mail;


use Auth;

class UserRepository extends BaseRepository
{
    use UploaderHelper;

    public function model(): string
    {
        return User::class;
    }

    function getDeletedUsers($is_merchant)
    {
        return User::onlyTrashed()->where('is_merchant', '=', $is_merchant)->get();
    }

    public function query(): Builder
    {
        return $this->object()->query();
    }

    function doLogin($data): bool
    {
        $remember_me = !empty($data['remember_me']);
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'is_active' => '1', 'is_ban' => 0], $remember_me)) {
            return true;
        }
        return false;
    }


    function doRegister($data)
    {
        $data['is_active'] = '1';
        $user = User::create($data);
        Auth::login($user);
        return $user;
    }

    function storeUser($data)
    {
        $data['is_active'] = '1';
        $user = User::create($data);
        return $user;
    }

    function sendLoginNotification($user)
    {
        try {
            $user->notify(new UserLoginNotification());
        } catch (Exception $e) {
//            return $e->getMessage();
        }
    }

    function sendLoginSms($user, $code)
    {
        try {
            $user->notify(new UserLoginNotification($code));
        } catch (Exception $exception) {
//
        }
    }

    function updatePhoneVerificationCode($verification)
    {
        $verification->update([
            'code' => $this->generatePIN(),
            'expire_in' => Carbon::now()->addHour()
        ]);
        return $verification;
    }

    function expirePhoneVerificationCode($verification)
    {
        $verification->update([
            'expire_in' => Carbon::now()
        ]);
    }

    function sendRegisterMail($email)
    {

        $code = $this->generatePIN();

        $email_doce = ['email' => $email, 'code' => $code, 'expire_in' => date('Y-m-d')];
        VerificationCode::create($email_doce);

        Mail::to($email)->send(new ActivationMail($code));
        if (!Auth::check())
            Session::put('activate_email', $email);

    }

    /**
     * @param int $digits
     * @return string
     */
    function generatePIN($digits = 4): string
    {
        try {
            $pin = random_int(pow(10, $digits - 1), pow(10, $digits) - 1);
        } catch (Exception $exception) {
            $i = 0; //counter
            $pin = ""; //our default pin is blank.
            while ($i < $digits) {
                //generate a random number between 0 and 9.
                $pin .= mt_rand(1, 9);
                $i++;
            }
        }
        return $pin;
    }

    function activateAccount($code)
    {
        $email = (Auth::check()) ? Auth::user()->email : Session::get('activate_email');
        $is_verified = VerificationCode::where('email', $email)->where('code', $code)->where('expire_in', date('Y-m-d'))->first();

        if ($is_verified) {
            User::where('email', $email)->update(['is_active' => 1]);
            $user = User::where('email', $email)->first();
            if (!Auth::check()) {
                Auth::loginUsingId($user->id);
                Session::put('activate_email', '');
            }
            return true;
        }

        return false;

    }

    public function getNotificationBody($key = 'user_login')
    {
        return NotificationBody::where('key', $key)->first();
    }


    function forgotPassword(User $user, $channel)
    {
        $token = $this->getToken();

        $data = ['email' => $user->email, 'token' => $token, 'expire_in' => date('Y-m-d')];

        $reset_email = ResetPassword::where('email', $user->email)->first();

        if (isset($reset_email))
            $reset_email->update(['token' => $token, 'expire_in' => date('Y-m-d')]);
        else
            ResetPassword::create($data);

        try {
            $user->notify(new ForgotPasswordNotification($token, $channel));
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    function resetPassword($token): bool
    {

        $reset_email = ResetPassword::where('token', $token)->where('expire_in', date('Y-m-d'))->first();

        if ($reset_email != null) {
            Session::put('reset_email', $reset_email->email);
            return true;
        } else
            return false;

    }


    function doResetPassword($data)
    {
        $session_email = Session::get('reset_email');

        $reset_email = ResetPassword::where('token', $data['token'])->where('email', $session_email)->where('expire_in', date('Y-m-d'))->first();

        if ($reset_email) {
            $user = User::where('email', $reset_email->email)->update(['password' => Hash::make($data['password'])]);
            ResetPassword::where('email', $session_email)->update(['expire_in' => null]);
            Session::put('reset_email', '');
            return true;
        } else
            return false;

    }


    protected function getToken()
    {
        return substr(hash_hmac('sha256', Str::random(50), config('app.key')), 0, 40);
    }


    function findUserById($id)
    {
        return User::where('id', $id)->with(['addresses.getCountry', 'addresses.getGovernment', 'addresses.getZone', 'addresses.getCity', 'wishlist', 'orders'])->first();
    }

    function findUserByIdAdmin($id)
    {
        return User::where('id', $id)->with(['orders'])->first();
    }

    function findUser($id)
    {
        return User::find($id);
    }

    function findUserWhere($where)
    {
        $query = User::query();
        foreach ($where as $column => $value) {
            $query->where($column, $value);
        }
        return $query->first();
    }

    function findUsertodayByIdAdmin($id)
    {
        $now = Carbon::today();
        return User::where('id', $id)->with(['orders' => function ($query) use ($now) {
            $query->where('created_at', '=', $now);
        }])->first();

    }

    function updateInformationData($data)
    {
        $user = User::where('id', Auth::user()->id)->update($data);
    }


    function saveAccountAddress($data)
    {
        $user = User::where('id', Auth::user()->id)->first();
        return $user->addresses()->create($data);

    }

    function saveAccountUserAddress($data, $id)
    {
        $user = User::where('id', $id)->first();
        return $user->addresses()->create($data);

    }

    function updateAccountAddress($data)
    {
        return UserAddress::where('user_id', Auth::id())->where('id', $data['id'])->update($data);
    }

    function destroyAccountAddress($id)
    {
        if (UserAddress::where('user_id', Auth::id())->count() > 1) {
            if (Order::where('user_id', Auth::id())->where('user_address_id', $id)->count())
                return ['code' => 201, 'message' => __('usermodule::account.address_attached_order')];
            UserAddress::where('user_id', Auth::id())->where('id', $id)->delete();
            return ['code' => 200, 'message' => __('usermodule::account.address_removed')];
        }
        return ['code' => 201, 'message' => __('usermodule::account.address_remove_limit')];
    }

    function userAdresses()
    {
        return UserAddress::where('user_id', Auth::id())->with(['getCountry', 'getCity', 'getGovernment', 'getZone'])->get();
    }

    function wishList()
    {
        if (auth()->check())
            return auth()->user()->wishlist()->get();
        else return false;
    }

    function saveSuggestionComplaintForm($data)
    {
        return Suggestion::create($data);
    }

    function saveContactus($data)
    {
        return Contactus::create($data);
    }

    function subscribeNewsletter($data)
    {
        return Newsletter::create($data);
    }


    function findAllUsers()
    {
        return User::where('is_merchant', 0)->with(['addresses.getCountry', 'addresses.getGovernment', 'addresses.getZone', 'addresses.getCity'])->orderBy('id', 'desc')->get();
    }

    function findAllMerchants()
    {
        return User::where('is_merchant', 1)->with(['addresses.getCountry', 'addresses.getGovernment', 'addresses.getZone', 'addresses.getCity'])->orderBy('id', 'desc')->get();
    }


    function findAllPhoneCodes()
    {
        return PhoneCode::orderBy('sort', 'asc')->get();
    }

    function saveUser($data)
    {
    }


    function deleteUser($id)
    {
    }


    public function UsersCount()
    {
        return User::where('is_merchant', 0)->count();

    }

    public function MerchantsCount()
    {
        return User::where('is_merchant', 1)->count();
    }

    function changeUserStatus($status, $id)
    {
        return User::where('id', $id)->update(['is_ban' => $status]);
    }

    function getuserAdresses($id)
    {
        return UserAddress::where('user_id', $id)->with(['getCountry', 'getCity', 'getGovernment', 'getZone'])->get();
    }

    function findUserAddress($id)
    {
        return UserAddress::where('user_id', auth()->user()->id)->where('id', $id)->first();
    }

    function findAddress($id)
    {
        return UserAddress::find($id);
    }


    public function bulkStatus($ids, $status)
    {
        return User::whereIn('id', $ids)->where('is_merchant', '0')->update(['is_ban' => $status]);
    }

    public function bulkCash($ids, $status)
    {
        return User::whereIn('id', $ids)->where('is_merchant', '0')->update(['can_cash' => $status]);
    }

    public function replyUser($data)
    {

        $suggestion = Suggestion::with('user')->where('id', $data['id'])->first();
        if (isset($data['attach'])) $data['file'] = implode(',', $this->uploadAlbumm($data['attach'], 'suggestion'));
        $data['suggesstion_id'] = $data['id'];
        $data['user_id'] = $suggestion->user_id;
        $data['reply_type'] = 1;
        unset($data['attach'], $data['id']);

        $reply = SuggesstionReply::create($data);
        if ($reply) {
            $editSuggestion = $suggestion->update(['reply_type' => 0]);
            return view('usermodule::front.account.user_reply', compact('suggestion', 'reply'));
        }
        return redirect()->back();
    }
}
