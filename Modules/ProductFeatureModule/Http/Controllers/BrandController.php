<?php

namespace Modules\ProductFeatureModule\Http\Controllers;

use App\Exports\BrandsExport;
use App\Imports\BrandsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ProductFeatureModule\Repository\BrandRepository;

// use Maatwebsite\Excel\Excel;

class BrandController extends Controller
{
    use UploaderHelper;
    use ApiResponseHelper;

    /**
     * @var BrandRepository
     */
    private BrandRepository $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->middleware('is_admin');

        $this->middleware('permission:show_brand')->only('index');
        $this->middleware('permission:add_brand')->only('create');
        $this->middleware('permission:delete_brand')->only('destroy');
        $this->middleware('permission:update_brand')->only(['edit', 'update']);

        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $brands = Brand::all();
        return view('productfeaturemodule::admin.brand.index', compact('brands'));
    }


    public function create()
    {
        return view('productfeaturemodule::admin.brand.create');
    }


    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('productfeaturemodule::admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'sort_order' => 'nullable|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->file('photo'))
            $data['photo'] = $this->upload($request->file('photo'), 'brand');

        $brand = Brand::where('id', $id)->update($data);

        return redirect('admin/brand')->with('updated', 'updated');

    }

    public function store(Request $request)
    {
        // validation

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'sort_order' => 'nullable|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->except('_token');
        $data['photo'] = $this->upload($request->file('photo'), 'brand');
        Brand::create($data);
        return redirect('admin/brand')->with('success', 'success');

    }

    public function destroy($id)
    {
        $brand = Brand::where('id', $id)->with('products')->first();
        if ($brand->products->count() <= 0) {
            Brand::destroy($id);
            return redirect('admin/brand')->with('deleted', 'deleted');

        }
        return redirect('admin/brand')->with('deleted', __('productfeaturemodule::admin.cant_delete_assign_product'));

    }

    public function bulk(Request $request)
    {
        $request->validate([
            'ids' => 'required',
            'method' => 'required|in:active,de-active,delete',
        ]);

        $ids = explode(',', $request->get('ids'));
        switch ($request->get('method')) {
            case 'active':
                $this->brandRepository->bulkStatus($ids, 1);
                break;
            case 'de-active':
                $this->brandRepository->bulkStatus($ids, 0);
                break;
            case 'delete':
                $failed = bulkDelete('brands', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }


    public function setBrand(Request $request)
    {
        $data = $request->except('_token');
        $data['photo'] = $this->upload($request->file('photo'), 'brand');
        Brand::create($data);
        $brands = Brand::all();
        return $this->setCode(200)->setData($brands)->send();

    }

    public function downloaBbrands(Excel $excel)
    {

        return Excel::download(new BrandsExport, 'brands.xlsx');


    }

    public function uploadBbrands(Request $request)
    {
        $request->validate(['brands' => 'required|file']);
        Excel::import(new BrandsImport, $request->file('brands'));
        return redirect()->back()->with('success', 'success');
    }
}
