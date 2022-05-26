<?php

namespace Modules\AreaModule\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;
use App\Exports\CountriesExport;
use App\Imports\CountriesImport;
use Modules\CommonModule\Helper\UploaderHelper;
use Maatwebsite\Excel\Facades\Excel;
use Modules\ConfigModule\Entities\Tax;
use Modules\CommonModule\Helper\ProductHelper;
use Modules\ProductModule\Entities\ProductCombination;
use Modules\ProductModule\Entities\Product;

class CountryController extends Controller
{
    use ApiResponseHelper;
    use ProductHelper;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->middleware('auth:admin')->except('getCountries', 'getCountryTax', 'getCountryProductTax');
        $this->middleware('permission:show_country')->only('index');
        $this->middleware('permission:add_country')->only('create');
        $this->middleware('permission:delete_country')->only('destroy');
        $this->middleware('permission:update_country')->only(['edit', 'update']);

        $this->countryRepository = $countryRepository;
    }


    public function index()
    {
        $countries = $this->countryRepository->findAllCountries();

        return view('areamodule::country.index', compact('countries'));
    }

    public function create()
    {
        return view('areamodule::country.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'nullable|numeric',
        ]);


        $countries = $this->countryRepository->save($request->except('_token'));
        return redirect('admin/country')->with('success', 'success');

    }

    public function edit($id)
    {
        $country = $this->countryRepository->findCountry($id);

        return view('areamodule::country.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'nullable|numeric',
        ]);


        $countries = $this->countryRepository->update($id, $request->except('_token', '_method'));
        return redirect('admin/country')->with('success', 'update');

    }

    public function destroy($id)
    {
        $status = $this->countryRepository->delete($id);
        if ($status)
            return redirect('admin/country')->with('deleted', 'deleted');

        return redirect('admin/country')->with('deleted', __('areamodule::area.cant_delete_country'));

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
                $failed = bulkDelete('countries', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }


    public function getCountries()
    {
        $countries = Country::with('governments.cities.zones')->get();

        return $this->setCode(200)->setData($countries)->send();
    }

    public function uploadCountry(Request $request)
    {
        $request->validate(['countries' => 'required|file']);
        Excel::import(new CountriesImport, $request->file('countries'));
        return redirect()->back()->with('success', 'success');
    }

    public function downloaCountry(Excel $excel)
    {
        return Excel::download(new CountriesExport, 'Countries.xlsx');
    }

}
