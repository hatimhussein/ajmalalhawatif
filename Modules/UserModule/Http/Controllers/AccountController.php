<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\UserModule\Entities\Suggestion;
use Modules\UserModule\Http\Resources\NotificationResource;
use Modules\UserModule\Repository\UserRepository;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\AreaModule\Repository\CityRepository;
use Modules\AreaModule\Repository\ZoneRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    use ApiResponseHelper;
    use UploaderHelper;

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;
    private CountryRepository $countryRepository;
    private GovernmentRepository $governmentRepository;
    private CityRepository $cityRepository;
    private ZoneRepository $zoneRepository;

    public function __construct(UserRepository $userRepository,
                                CountryRepository $countryRepository,
                                GovernmentRepository $governmentRepository,
                                CityRepository $cityRepository,
                                ZoneRepository $zoneRepository)
    {
        $this->middleware('auth')->except('subscribeNewsletter');
        $this->userRepository = $userRepository;
        $this->countryRepository = $countryRepository;
        $this->governmentRepository = $governmentRepository;
        $this->cityRepository = $cityRepository;
        $this->zoneRepository = $zoneRepository;

    }


    public function dashboard()
    {

        $user = $this->userRepository->findUserById(auth()->id());

        return view('usermodule::front.account.dashboard', compact('user'));
    }


    public function editInformationData()
    {

        $user = $this->userRepository->findUserById(auth()->id());
        $countries = $this->countryRepository->findAllCountries();
        $governments = $this->governmentRepository->findAll();
        $cities = $this->cityRepository->findWhere('government_id', $user->government_id);
        $zones = $this->zoneRepository->findWhere('city_id', $user->city_id);
        $phone_codes = $this->userRepository->findAllPhoneCodes();
        if ($user->is_merchant == 1)
            return view('usermodule::front.account.merchant_information', compact(['user', 'countries', 'governments', 'cities', 'zones', 'phone_codes']));
        return view('usermodule::front.account.account_information', compact(['user', 'countries', 'governments', 'cities', 'zones', 'phone_codes']));
    }

    public function updateInformationData(Request $request)
    {

        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'required|numeric|digits_between:9,14|unique:users,phone,' . auth()->id(),
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',
        ]);

        $data = $request->except('_token');

        $this->userRepository->updateInformationData($data);

        return $this->setCode(200)->setSuccess(__('commonmodule::validation.updated'))->send();


    }

    public function updateMerchantInformationData(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'required|numeric|digits_between:9,14|unique:users,phone,' . auth()->id(),
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->except('_token');

        if ($request->file('logo')) {
            $data['logo'] = $this->upload($request->file('logo'), 'user');
        } else {
            unset($data['logo']);
        }


        $this->userRepository->updateInformationData($data);

        return $this->setCode(200)->setSuccess(__('commonmodule::validation.updated'))->send();


    }


    public function ChangePassword()
    {
        $user = $this->userRepository->findUserById(auth()->id());
        return view('usermodule::front.account.change_password', compact('user'));
    }


    public function updatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $old = $request->old_password;
        $user = User::find(auth()->id());
        $hashedPassword = $user->password;

        if (Hash::check($old, $hashedPassword)) {
            //Change the password
            $user->update([
                'password' => $request->password
            ]);

            return $this->setCode(200)->setError(__('commonmodule::validation.updated'))->send();

        }

        return $this->setCode(201)->setSuccess(__('commonmodule::validation.old_password_error'))->send();

    }


    public function accountAddress()
    {
        $user = $this->userRepository->findUserById(auth()->id());
        $countries = $this->countryRepository->findAllCountries();

        return view('usermodule::front.account.address', compact(['user', 'countries']));
    }

    public function editAccountAddress($id)
    {

        $address = UserAddress::where('id', $id)->where('user_id', auth()->id())->first();
        if (!$address)
            return redirect()->back();
        $countries = $this->countryRepository->findAllCountries();
        $governments = $this->governmentRepository->findWhere('country_id', $address->country_id);
        $cities = $this->cityRepository->findWhere('government_id', $address->government_id);
        $zones = $this->zoneRepository->findWhere('city_id', $address->city_id);

        return view('usermodule::front.account.edit_address', compact(['address', 'countries', 'governments', 'cities', 'zones']));
    }


    public function saveAccountAddress(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',

        ]);
        $data = $request->except('_token');
        $user = $this->userRepository->saveAccountAddress($data);
    }

    public function updateAccountAddress(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',


        ]);
        $data = $request->except('_token');
        $user = $this->userRepository->updateAccountAddress($data);
    }

    public function destroyAddress($id)
    {
        $removed = $this->userRepository->destroyAccountAddress($id);
        return $this->setCode($removed['code'])->setSuccess($removed['message'])->send();
    }

    public function newsletter()
    {
        $user = $this->userRepository->findUserById(auth()->id());
        return view('usermodule::front.account.account_information', compact('user'));
    }

    public function subscribeNewsletter(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters',
        ]);

        $this->userRepository->subscribeNewsletter($request->except('_token'));
        return $this->setCode(200)->setSuccess(__('commonmodule::validation.sub_newsletter'))->send();

    }

    public function userReply($id)
    {
        $suggestion = Suggestion::where('user_id',auth()->user()->id)->where('id',$id)->first();
        return view('usermodule::front.account.account_suggestion', compact('suggestion'));
    }

    public function allSuggestion()
    {
        $suggestion = Suggestion::where('user_id',auth()->user()->id)->get();
        return view('usermodule::front.account.allsuggestion', compact('suggestion'));
    }

    public function notifications(): JsonResponse
    {
        $notifications = auth()->user()->unreadNotifications;
        return $this->setCode(200)->setData(['notifications' => NotificationResource::collection($notifications), 'count' => $notifications->count()])->send();
    }

    public function readNotification(Request $request): JsonResponse
    {
        $ids = explode(',', $request->get('ids', ''));
        auth()->user()->notifications()->whereIn('id', $ids)->update(['read_at' => now()]);

        return $this->setCode(200)->setSuccess(__('adminmodule::admin.done'))->send();
    }
}
