<?php

namespace Modules\ProductFeatureModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductFeatureModule\Entities\Catalog;
use Modules\ProductFeatureModule\Entities\CatalogCategory;
use Modules\ProductFeatureModule\Repository\BrandRepository;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CatalogController extends Controller
{
    use ApiResponseHelper;
    use UploaderHelper;

    /**
     * @var BrandRepository
     */
    private BrandRepository $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->middleware('auth:admin')->only('index', 'create', 'store', 'edit', 'update', 'destroy');
        $this->middleware('permission:show_catalog')->only('index');
        $this->middleware('permission:add_catalog')->only(['create', 'store']);
        $this->middleware('permission:update_catalog')->only(['edit', 'update']);
        $this->middleware('permission:delete_catalog')->only('destroy');

        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $catalogs = Catalog::with('brand', 'catalogCategory')->get();
        return view('productfeaturemodule::admin.catalog.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = CatalogCategory::whereNotNull('parent_id')->get();
        $brands = $this->brandRepository->findAllBrands();
        return view('productfeaturemodule::admin.catalog.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'desc_en' => 'nullable',
            'desc_ar' => 'nullable',
            'file' => 'mimes:pdf,jpg,png,jpeg,mp4,ogg,3gp',
            'catalog_category_id' => 'required|exists:catalog_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'viewed_levels.*' => 'in:1,2,3,4,5'
        ]);

        $data['file'] = $this->uploadFile($request->file('file'), 'catalog');

        Catalog::create($data);
        return redirect()->route('catalog.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);
        $categories = CatalogCategory::whereNotNull('parent_id')->get();
        $brands = $this->brandRepository->findAllBrands();
        return view('productfeaturemodule::admin.catalog.edit', compact('catalog', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        $catalog = Catalog::findOrFail($id);

        $data = $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'desc_en' => 'nullable',
            'desc_ar' => 'nullable',
            'catalog_category_id' => 'required|exists:catalog_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'viewed_levels.*' => 'in:1,2,3,4,5'
        ]);

        if ($request->file('file')) {
            $request->validate([
                'file' => 'mimes:pdf,jpg,png,jpeg,mp4,ogg,3gp',
            ]);
            $data['file'] = $this->uploadFile($request->file('file'), 'catalog');
        }
        $catalog->update($data);

        return redirect()->route('catalog.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $catalog = Catalog::find($id);
        if ($catalog)
            $catalog->delete();
        return back();
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function bulk(Request $request)
    {
        $request->validate([
            'ids' => 'required',
            'method' => 'required|in:active,de-active,delete',
        ]);

        switch ($request->get('method')) {
            case 'delete':
                $failed = bulkDelete('catalogs', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }


    public function front(Request $request)
    {
        $viewed_level = (auth()->check() && auth()->user()->is_merchant) ? auth()->user()->price_level : '5';

        if ($request->ajax()) {
            $catalogs = $this->filter($request, $viewed_level);
            return $this->setCode(200)->setData($catalogs->toArray())->send();
        }

        $brands = Brand::all();
        $catalog_categories = CatalogCategory::whereNull('parent_id')->get();
        $catalog_sub_categories = CatalogCategory::whereNotNull('parent_id')->get();
        $catalogs = Catalog::where('viewed_levels', 'like', '%' . $viewed_level . '%')->get();
        return view('fronthomemodule::catalog', compact('catalog_categories', 'catalog_sub_categories', 'catalogs', 'brands'));
    }

    public function filter(Request $request, $viewed_level)
    {
        $query = Catalog::query()->where('viewed_levels', 'like', '%' . $viewed_level . '%');
        if ($request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->cat_id) {
            $category = CatalogCategory::find($request->cat_id);
            if ($category->parent_id) {
                $query->where('catalog_category_id', $category->id);
            } else {
                $query->whereHas('catalogCategory', function ($q) use ($category) {
                    return $q->where('parent_id', $category->id);
                });
            }
        }
        return $query->get();
    }

    /**
     * @param $id
     * @return BinaryFileResponse
     */
    public function download($id)
    {
        $catalog = Catalog::findOrFail($id);
        $file_path = 'files/catalog/' . $catalog->file;
        $arr = explode('.', $catalog->file);
        $ext = end($arr);
        $filename = LanguageHelper::nameTranslate($catalog) . '.' . $ext;

        return response()->download($file_path, $filename);
    }
}
