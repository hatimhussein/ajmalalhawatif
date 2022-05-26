<?php

namespace Modules\AdminModule\Http\Controllers;

use App\Imports\MerchantsImport;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Modules\AdminModule\Repository\MerchantRepository;
use Modules\AreaModule\Repository\CityRepository;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\AreaModule\Repository\ZoneRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\UserModule\Repository\UserRepository;

class MerchantsController extends Controller
{
    use ApiResponseHelper;
    use UploaderHelper;

    private MerchantRepository $merchantRepository;

    public function __construct(MerchantRepository   $merchantRepository,
                                CountryRepository    $countryRepository,
                                GovernmentRepository $governmentRepository,
                                CityRepository       $cityRepository,
                                ZoneRepository       $zoneRepository,
                                UserRepository       $userRepository)
    {
        $this->middleware('auth:admin');

        $this->countryRepository = $countryRepository;
        $this->merchantRepository = $merchantRepository;
        $this->governmentRepository = $governmentRepository;
        $this->cityRepository = $cityRepository;
        $this->zoneRepository = $zoneRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */


    public function index()
    {
        $merchants = $this->merchantRepository->getMerchants();
        $this->merchantRepository->markSeen($merchants);
        return view('adminmodule::merchants.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $countries = $this->countryRepository->findAllCountries();
        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('adminmodule::merchants.create', compact('countries', 'phone_codes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|min:3',
            'authorized_person' => 'required|min:3',
            'email' => 'required|email|unique:merchants,email',
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'required|numeric|digits_between:9,14|unique:users,phone',
            'password' => 'min:6|required',
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',
            'has_forward_account' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        $data = $request->except('_token');

        if (isset($request->status)) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        if ($request->file('logo')) {
            $data['logo'] = $this->upload($request->file('logo'), 'user');
        } else {
            $data['logo'] = null;
        }

        $this->merchantRepository->create($data);
        return redirect('admin/merchants')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        return view('adminmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $merchant = $this->merchantRepository->getMerchant($id);
        $countries = $this->countryRepository->findAllCountries();
        $governments = $this->governmentRepository->findWhere('country_id', $merchant->country_id);
        $cities = $this->cityRepository->findWhere('government_id', $merchant->government_id);
        $zones = $this->zoneRepository->findWhere('city_id', $merchant->city_id);
        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('adminmodule::merchants.edit', compact('merchant', 'countries', 'governments', 'cities', 'zones', 'phone_codes'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|min:3',
            'authorized_person' => 'required|min:3',
            'email' => 'sometimes|email',
            'phone_code_id' => 'required|exists:phone_codes,id',
            'phone' => 'sometimes|numeric|digits_between:9,14',
            'password' => 'sometimes|nullable|min:6',
            'country_id' => 'required',
            'government_id' => 'required',
            'city_id' => 'required',
            'zone_id' => 'required',
            'has_forward_account' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $merchant = $this->merchantRepository->getMerchant($id);
        if (!$merchant) {
            return back();
        }

        $activated = false;
        $data = $request->except('_token');

        if (isset($request->status)) {
            $data['is_active'] = 1;
            if (!$merchant->is_active)
                $activated = true;
        } else {
            $data['is_active'] = 0;
        }
        if (!isset($request->password) || $request->password == '') {
            unset($data['password']);
        }

        if ($request->file('logo')) {
            $data['logo'] = $this->upload($request->file('logo'), 'user');
        } else {
            unset($data['logo']);
        }

        $merchant->update($data);

        if ($activated)
            $this->merchantRepository->sendActivateNotification($merchant);

        return redirect('admin/merchants')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */

    public function getNewCount()
    {
        return $this->merchantRepository->getNewCount();
    }


    public function destroy($id)
    {
        $user = $this->merchantRepository->findMerchantById($id);
        if ($user->orders()->count()) {
            return redirect('admin/merchants')->with(['user_deleted' => 'failed']);
        } else {
            $user->delete();
            return redirect('admin/merchants')->with(['deleted' => 'deleted']);
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
                $this->merchantRepository->bulkStatus($ids, 0);
                break;
            case 'de-active':
                $this->merchantRepository->bulkStatus($ids, 1);
                break;
            case 'delete':
                $failed = bulkDelete('users', $request->get('ids'), "`is_merchant` = '1'");
                break;
            case 'can_cash':
                $this->merchantRepository->bulkCash($ids, 1);
                break;
            case 'can_not_cash':
                $this->merchantRepository->bulkCash($ids, 0);
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }


    public function uploadMerchants(Request $request)
    {
        $request->validate(['merchants' => 'required|file']);
        Excel::import(new MerchantsImport, $request->file('merchants'));
        return redirect()->back()->with('success', 'success');
    }
}
