<?php

namespace Modules\AreaModule\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Repository\CityRepository;
use Modules\AreaModule\Repository\ZoneRepository;
use App\Exports\CityExport;
use App\Imports\CityImport;
use Modules\CommonModule\Helper\UploaderHelper;
use Maatwebsite\Excel\Facades\Excel;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\AreaModule\Repository\CountryRepository;


class CityController extends Controller
{
    use ApiResponseHelper;


    public function __construct(GovernmentRepository $governmentRepository,
                                CityRepository $cityRepository,
                                CountryRepository $countryRepository)
    {
        $this->middleware('auth:admin')->except(['getCities', 'getZoneList']);
        $this->middleware('permission:show_city')->only('index');
        $this->middleware('permission:add_city')->only('create');
        $this->middleware('permission:delete_city')->only('destroy');
        $this->middleware('permission:update_city')->only(['edit', 'update']);

        $this->governmentRepository = $governmentRepository;
        $this->countryRepository = $countryRepository;
        $this->cityRepository = $cityRepository;
    }


    public function index()
    {
        $cities = $this->cityRepository->findAll();
        return view('areamodule::city.index', compact('cities'));
    }

    public function create()
    {

        $countries = $this->countryRepository->findAllCountries();

        return view('areamodule::city.create', compact('countries'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required',
            'government_id' => 'required',
            'shipping_price' => 'required|numeric',
        ]);


        $countries = $this->cityRepository->save($request->except('_token'));
        return redirect('admin/city')->with('success', 'success');

    }

    public function edit($id)
    {
        $city = $this->cityRepository->find($id);

        $countries = $this->countryRepository->findAllCountries();
        $governments = [];
        if ($city->country != null)
            $governments = $this->governmentRepository->findWhere('country_id', $city->country->id);

        return view('areamodule::city.edit', compact('city', 'countries', 'governments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required|numeric',
            'government_id' => 'required|numeric',
            'shipping_price' => 'required|numeric',

        ]);


        $countries = $this->cityRepository->update($id, $request->except('_token', '_method'));
        return redirect('admin/city')->with('success', 'update');

    }


    public function destroy($id)
    {
        $status = $this->cityRepository->delete($id);
        if ($status)
            return redirect('admin/city')->with('deleted', 'deleted');

        return redirect('admin/city')->with('deleted', __('areamodule::area.cant_delete_city'));

    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function bulk(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => 'required',
            'method' => 'required|in:delete',
        ]);

//        $ids = explode(',', $request->get('ids'));
        switch ($request->get('method')) {
            case 'delete':
                $failed = bulkDelete('cities', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }

    public function getCities(Request $request)
    {

        $cities = CityRepository::findWhere('government_id', $request->gov_id);
        return $this->setCode(200)->setData($cities)->send();
    }

    public function getZoneList(Request $request)
    {

        $zones = ZoneRepository::findWhere('city_id', $request->city_id);
        return $this->setCode(200)->setData($zones)->send();
    }

    public function uploadCity(Request $request)
    {
        $request->validate(['city' => 'required|file']);
        Excel::import(new CityImport, $request->file('city'));
        return redirect()->back()->with('success', 'success');
    }

    public function downloadCity(Excel $excel)
    {
        return Excel::download(new CityExport, 'Cities.xlsx');


    }

}
