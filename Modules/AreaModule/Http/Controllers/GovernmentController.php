<?php

namespace Modules\AreaModule\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Exports\GovernmentExport;
use App\Imports\GovernmentImport;
use Modules\CommonModule\Helper\UploaderHelper;
use Maatwebsite\Excel\Facades\Excel;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;

class GovernmentController extends Controller
{
    use ApiResponseHelper;

    public function __construct(GovernmentRepository $governmentRepository, CountryRepository $countryRepository)
    {
        $this->middleware('auth:admin')->except('getGovernmentList');
        $this->middleware('permission:show_government')->only('index');
        $this->middleware('permission:add_government')->only('create');
        $this->middleware('permission:delete_government')->only('destroy');
        $this->middleware('permission:update_government')->only(['edit', 'update']);

        $this->governmentRepository = $governmentRepository;
        $this->countryRepository = $countryRepository;

    }


    public function index()
    {
        $governments = $this->governmentRepository->findAll();

        return view('areamodule::government.index', compact('governments'));
    }

    public function create()
    {

        $countries = $this->countryRepository->findAllCountries();

        return view('areamodule::government.create', compact('countries'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required',
        ]);


        $countries = $this->governmentRepository->save($request->except('_token'));
        return redirect('admin/government')->with('success', 'success');

    }

    public function edit($id)
    {
        $government = $this->governmentRepository->find($id);
        $countries = $this->countryRepository->findAllCountries();

        return view('areamodule::government.edit', compact('government', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required|numeric',
        ]);


        $countries = $this->governmentRepository->update($id, $request->except('_token', '_method'));
        return redirect('admin/government')->with('success', 'update');

    }


    public function destroy($id)
    {
        $status = $this->governmentRepository->delete($id);
        if ($status)
            return redirect('admin/government')->with('deleted', 'deleted');

        return redirect('admin/government')->with('deleted', __('areamodule::area.cant_delete_government'));
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
                $failed = bulkDelete('governments', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }


    public function getGovernmentList(Request $request)
    {
        $countries = $this->governmentRepository->findWhere('country_id', $request->country_id);
        return $this->setCode(200)->setData($countries)->send();

    }

    public function uploadGovernment(Request $request)
    {
        $request->validate(['government' => 'required|file']);
        Excel::import(new GovernmentImport, $request->file('government'));
        return redirect()->back()->with('success', 'success');
    }

    public function downloadGovernment(Excel $excel)
    {
        return Excel::download(new GovernmentExport, 'Countries.xlsx');


    }


}
