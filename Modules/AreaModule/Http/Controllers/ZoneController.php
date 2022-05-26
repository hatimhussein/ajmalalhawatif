<?php

namespace Modules\AreaModule\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Repository\CityRepository;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\AreaModule\Repository\ZoneRepository;
use App\Exports\ZoneExport;
use App\Imports\ZoneImport;
use Maatwebsite\Excel\Facades\Excel;
use Modules\CommonModule\Helper\ApiResponseHelper;

class ZoneController extends Controller
{


    use ApiResponseHelper;


    /**
     * @var ZoneRepository
     */
    private ZoneRepository $zoneRepository;
    private CountryRepository $countryRepository;
    private GovernmentRepository $governmentRepository;
    private CityRepository $cityRepository;


    public function __construct(ZoneRepository $zoneRepository,
                                CountryRepository $countryRepository,
                                GovernmentRepository $governmentRepository,
                                CityRepository $cityRepository)
    {
        $this->middleware('auth:admin')->except('getZoneList');
        $this->middleware('permission:show_zone')->only('index');
        $this->middleware('permission:add_zone')->only('create');
        $this->middleware('permission:delete_zone')->only('destroy');
        $this->middleware('permission:update_zone')->only(['edit', 'update']);

        $this->countryRepository = $countryRepository;
        $this->zoneRepository = $zoneRepository;
        $this->governmentRepository = $governmentRepository;
        $this->cityRepository = $cityRepository;
    }


    public function index()
    {
        $zones = $this->zoneRepository->findAll();
        return view('areamodule::zone.index', compact('zones'));
    }

    public function create()
    {

        $countries = $this->countryRepository->findAllCountries();

        return view('areamodule::zone.create', compact('countries'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required|numeric',
            'government_id' => 'required|numeric',
            'city_id' => 'required|numeric',

        ]);


        $countries = $this->zoneRepository->save($request->except('_token'));
        return redirect('admin/zone')->with('success', 'success');

    }

    public function edit($id)
    {
        $zone = $this->zoneRepository->find($id);
        $countries = $this->countryRepository->findAllCountries();
        $governments = [];
        $cities = [];

        if ($zone->country != null)
            $governments = $this->governmentRepository->findWhere('country_id', $zone->country->id);
        if ($zone->government != null)
            $cities = $this->cityRepository->findWhere('government_id', $zone->government->id);

        return view('areamodule::zone.edit', compact('zone', 'countries', 'governments', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required|numeric',
            'government_id' => 'required|numeric',
            'city_id' => 'required|numeric',


        ]);


        $countries = $this->zoneRepository->update($id, $request->except('_token', '_method'));
        return redirect('admin/zone')->with('success', 'update');

    }


    public function destroy($id)
    {
        $status = $this->zoneRepository->delete($id);
        if ($status)
            return redirect('admin/zone')->with('deleted', 'deleted');

        return redirect('admin/zone')->with('deleted', __('areamodule::area.cant_delete_zone'));
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
                $failed = bulkDelete('zones', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }

    /**
     * @return JsonResponse
     */
    public function getZoneList(): JsonResponse
    {
        $zones = $this->zoneRepository->getAll();
        return $this->setCode(200)->setData($zones->keyBy('id'))->send();
    }

    public function uploadZone(Request $request)
    {
        $request->validate(['zone' => 'required|file']);
        Excel::import(new ZoneImport, $request->file('zone'));
        return redirect()->back()->with('success', 'success');
    }

    public function downloadZone(Excel $excel)
    {
        return Excel::download(new ZoneExport, 'Zones.xlsx');
    }

}
