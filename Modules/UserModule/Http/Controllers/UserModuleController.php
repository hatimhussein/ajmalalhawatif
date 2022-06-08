<?php

namespace Modules\UserModule\Http\Controllers;

use App\Imports\UsersImport;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Modules\AreaModule\Repository\CityRepository;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\AreaModule\Repository\ZoneRepository;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Notifications\UserRegisterNotification;
use Modules\UserModule\Repository\UserRepository;
use Modules\UserModule\Repository\UserLogRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Auth;
use Session;

class UserModuleController extends Controller
{
    use ApiResponseHelper;

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;
    /**
     * @var CountryRepository
     */
    private CountryRepository $countryRepository;
    /**
     * @var GovernmentRepository
     */
    private GovernmentRepository $governmentRepository;
    /**
     * @var CityRepository
     */
    private CityRepository $cityRepository;
    /**
     * @var ZoneRepository
     */
    private ZoneRepository $zoneRepository;
    /**
     * @var UserLogRepository
     */
    private UserLogRepository $userLogRepository;

    public function __construct(UserRepository $userRepository,
                                CountryRepository $countryRepository,
                                GovernmentRepository $governmentRepository,
                                CityRepository $cityRepository,
                                ZoneRepository $zoneRepository,
                                UserLogRepository $userLogRepository)
    {
        // $this->middleware('is_admin');
        $this->userRepository = $userRepository;
        $this->countryRepository = $countryRepository;
        $this->governmentRepository = $governmentRepository;
        $this->cityRepository = $cityRepository;
        $this->zoneRepository = $zoneRepository;
        $this->userLogRepository = $userLogRepository;
        $this->middleware('permission:users')->only(['show', 'index']);
    }

    public function restoreUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->back()->with('user_updated', 'updated');
    }

    function index()
    {
        $users = $this->userRepository->findAllUsers();
        return view('usermodule::admin.user.index', compact('users'));
    }

    function deletedUsers()
    {
        $users = $this->userRepository->getDeletedUsers(1);
        return view('usermodule::admin.user.deleted_users', compact('users'));
    }

    function deletedCustomers()
    {
        $users = $this->userRepository->getDeletedUsers(0);
        return view('usermodule::admin.user.deleted_customers', compact('users'));
    }

    public function show($id)
    {
        $user = $this->userRepository->findUserByIdAdmin($id);
        return view('usermodule::admin.user.show', compact('user'));
    }

    public function UserActivityDetails($id)
    {
        $user = $this->userRepository->findUsertodayByIdAdmin($id);
        return view('usermodule::admin.user.show', compact('user'));
    }

    function changeUserStatus($status, $id)
    {
        $user = $this->userRepository->changeUserStatus($status, $id);
        return redirect()->back()->with('updated', 'updated');
    }


    public function create()
    {
        $countries = $this->countryRepository->findAllCountries();
        $phone_codes = $this->userRepository->findAllPhoneCodes();
        return view('usermodule::admin.user.create', compact('countries', 'phone_codes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'required|numeric|digits_between:9,14|unique:users,phone',
            'password' => 'min:6|required',
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',
        ]);

        $data = $request->except('_token');
        $data['is_active'] = 1;
        $this->userRepository->storeUser($data);
        return redirect('admin/users')->with(['success' => 'success']);
    }


    public function edit($id)
    {
        $user = $this->userRepository->findUserByIdAdmin($id);
        $countries = $this->countryRepository->findAllCountries();
        $governments = $this->governmentRepository->findWhere('country_id', $user->country_id);
        $cities = $this->cityRepository->findWhere('government_id', $user->government_id);
        $zones = $this->zoneRepository->findWhere('city_id', $user->city_id);
        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('usermodule::admin.user.edit', compact('user', 'countries', 'governments', 'cities', 'zones', 'phone_codes'));
    }


    public function update(Request $request, $id)
    {
        $user = $this->userRepository->findUserByIdAdmin($id);

        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'required|numeric|digits_between:9,14|unique:users,phone,' . $user->id,
            'password' => 'nullable|min:6',
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',
        ]);

        $data = $request->except('_token');
        if (!empty($data['password']))
            $data['password'] = Hash::make($data['password']);
        else
            unset($data['password']);

        $user->update($data);

        return redirect('admin/users')->with(['success' => 'success']);
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findUserByIdAdmin($id);
        if ($user->orders->count()) {
            return redirect('admin/users')->with(['user_deleted' => 'failed']);
        } else {
            $user->delete();
            return redirect('admin/users')->with(['deleted' => 'deleted']);
        }
    }

    public function bulk(Request $request)
    {
        $request->validate([
            'ids' => 'required',
            'method' => 'required|in:active,de-active,delete,can_cash,can_not_cash',
        ]);

        $ids = explode(',', $request->get('ids'));
        switch ($request->get('method')) {
            case 'active':
                $this->userRepository->bulkStatus($ids, 0);
                break;
            case 'de-active':
                $this->userRepository->bulkStatus($ids, 1);
                break;
            case 'delete':
                $failed = bulkDelete('users', $request->get('ids'), "`is_merchant` = '0'");
                break;
            case 'can_cash':
                $this->userRepository->bulkCash($ids, 1);
                break;
            case 'can_not_cash':
                $this->userRepository->bulkCash($ids, 0);
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }


    public function uploadUsers(Request $request)
    {
        $request->validate(['users' => 'required|file']);
        Excel::import(new UsersImport, $request->file('users'));
        return redirect()->back()->with('success', 'success');
    }

//    front


    function showLogin()
    {
        $phoneLogin = $this->userRepository->getNotificationBody()->send_sms;
        $phone_codes = $this->userRepository->findAllPhoneCodes();
        $countries = $this->countryRepository->findAllCountries();

        $resetSms = $this->userRepository->getNotificationBody('forgot_password')->send_sms;

        return view('usermodule::front.auth.login', compact('phoneLogin', 'countries', 'phone_codes', 'resetSms'));
    }

    function showActivation()
    {
        $email = Session::get('activate_email');

        if (Auth::check() && Auth::user()->is_active) {
            return redirect('/');
        } else if (!isset($email) && $email != "") {
            return redirect('/');
        }

        return view('usermodule::front.auth.activation');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function sendLoginSms(Request $request): JsonResponse
    {
        $request->validate([
            'phone' => 'required|numeric|digits_between:9,14',
            'phone_code_id' => 'required',
        ]);

        $phoneLogin = $this->userRepository->getNotificationBody()->send_sms;

        if (!$phoneLogin) {
            return $this->setCode(201)->setError('not allowed')->send();
        }

        $user = $this->userRepository->findUserWhere([
            'phone' => $request->input('phone'),
            'phone_code_id' => $request->input('phone_code_id')
        ]);

        if (!$user) {
            return $this->setCode(201)->setError(__('commonmodule::validation.login_error'))->send();
        }

        if ($user->phoneVerification) {
            if (!Carbon::parse($user->phoneVerification->expire_in)->isFuture())
                $user->phoneVerification = $this->userRepository->updatePhoneVerificationCode($user->phoneVerification);
            $code = $user->phoneVerification->code;
        } else {
            $code = $this->userRepository->generatePIN();
            $user->phoneVerification()->create([
                'code' => $code,
                'expire_in' => Carbon::now()->addHour()
            ]);
        }

        $this->userRepository->sendLoginSms($user, $code);

        return $this->setCode(200)->setSuccess(__('usermodule::login.phone_code_Sent'))
            ->setData(['phone' => $user->phone])->send();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function verifyPhoneCode(Request $request): JsonResponse
    {
        $request->validate([
            'phone' => 'required|numeric|digits_between:9,14',
            'code' => 'required|numeric'
        ]);
        $code = $request->get('code');

        $user = $this->userRepository->findUserWhere(['phone' => $request->input('phone')]);
        if ($user) {
            if ($user->phoneVerification->code == $code) {
                if (Carbon::parse($user->phoneVerification->expire_in)->isFuture()) {
                    Auth::login($user, true);
                    $this->userRepository->expirePhoneVerificationCode($user->phoneVerification);
                    return $this->setCode(200)->setSuccess(__('usermodule::login.login_success'))->setData(['url' => redirect()->intended('/')->getTargetUrl()])->send();
                } else {
                    $user->phoneVerification = $this->userRepository->updatePhoneVerificationCode($user->phoneVerification);
                    $this->userRepository->sendLoginSms($user, $user->phoneVerification->code);
                    return $this->setCode(201)->setSuccess(__('usermodule::login.new_phone_code_Sent'))->send();
                }
            }
        }
        return $this->setCode(201)->setError(__('commonmodule::validation.login_error'))->send();
    }


    function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $data = $request->except('_token');
        $satatus = $this->userRepository->doLogin($data);

        if ($satatus) {
            Session::put('activate_email', '');

            $this->userLogRepository->saveUserLog(auth()->user());
//            $this->userRepository->sendLoginNotification(auth()->user());

            return $this->setCode(200)->setSuccess(redirect()->intended('/')->getTargetUrl())->send();
        }

        return $this->setCode(201)->setError(__('commonmodule::validation.login_error'))->send();
    }

    function doRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'required|numeric|digits_between:9,14|unique:users,phone',
            'password' => 'min:6',
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',
        ]);


        $data = $request->except('_token');
        $user = $this->userRepository->doRegister($data);
        if ($user) {
            try {
                $user->notify(new UserRegisterNotification());
//            $this->userRepository->sendRegisterMail($user->email);
            } catch (Exception $e) {
                // do nothing
            }
            return $this->setCode(200)->setSuccess(__('commonmodule::validation.saved'))->send();
        }

        return $this->setCode(201)->setError(__('commonmodule::validation.login_error'))->send();

    }

    public function forgotPasswordPhone(Request $request)
    {
        if (!$this->userRepository->getNotificationBody('forgot_password')->send_sms) {
            return $this->setCode(201)->setError(__('commonmodule::validation.reset_pass_mail_message_error'))->send();
        }

        $request->validate([
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'required|numeric|digits_between:9,14',
        ]);

        $user = $this->userRepository->findUserWhere([
            'phone_code_id' => $request->phone_code_id,
            'phone' => $request->phone,
        ]);

        if (!$user) {
            return $this->setCode(201)->setError(__('usermodule::login.creds_not_found'))->send();
        }

        $send = $this->userRepository->forgotPassword($user, 'sms');

        if ($send)
            return $this->setCode(200)->setSuccess(__('commonmodule::validation.reset_pass_mail_message'))->send();

        return $this->setCode(201)->setError(__('commonmodule::validation.reset_pass_mail_message_error'))->send();
    }


    function forgotPassword(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user = $this->userRepository->findUserWhere(['email' => $request->email]);

        if (!$user) {
            return $this->setCode(201)->setError(__('usermodule::login.creds_not_found'))->send();
        }

        $send = $this->userRepository->forgotPassword($user, 'mail');

        if ($send)
            return $this->setCode(200)->setSuccess(__('commonmodule::validation.reset_pass_mail_message'))->send();

        return $this->setCode(201)->setError(__('commonmodule::validation.reset_pass_mail_message_error'))->send();
    }


    function resetPassword($token)
    {
        $valid = $this->userRepository->resetPassword($token);

        if ($valid)
            return view('usermodule::front.auth.reset_password', compact('token'));

        return redirect('/');
    }

    function doResetPassword(Request $request): JsonResponse
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);


        $valid = $this->userRepository->doResetPassword($request->except('_token'));

        if ($valid)
            return $this->setCode(200)->setSuccess(__('commonmodule::validation.password_changed'))->send();

        return $this->setCode(201)->setError(__('commonmodule::validation.error'))->send();
    }


    function activateAccount(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required',
        ]);

        $code = $request->code;
        $is_active = $this->userRepository->activateAccount($code);

        if ($is_active)
            return $this->setCode(200)->setSuccess(__('commonmodule::validation.activated'))->send();

        return $this->setCode(201)->setError(__('commonmodule::validation.activate_code_error'))->send();
    }

    public function UserActivity()
    {
        $users = $this->userLogRepository->findAllUsers();
        $title = __('usermodule::admin.user_activity');

        return view('usermodule::admin.user.user_report', compact('users', 'title'));
    }

    public function MerchantsActivity()
    {
        $users = $this->userLogRepository->findAllMerchants();
        $title = __('usermodule::admin.merchants_activity');
        return view('usermodule::admin.user.user_report', compact('users', 'title'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function replySuggestion(Request $request)
    {

        $request->validate([
            'attach.*' => 'mimes:pdf,docx,doc,jpg,jpeg,png,mp4,mov',
            'reply' => 'required|min:3',
        ]);
        $reply = $this->userRepository->replyUser($request->all());
        return $reply;
    }
}
