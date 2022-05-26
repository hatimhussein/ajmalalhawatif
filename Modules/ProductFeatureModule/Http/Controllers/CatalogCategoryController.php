<?php

namespace Modules\ProductFeatureModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ProductFeatureModule\Entities\CatalogCategory;

class CatalogCategoryController extends Controller
{
    use UploaderHelper;

    public function __construct()
    {
        $this->middleware('auth:admin,is_admin');

        $this->middleware('permission:show_catalog_category')->only('index');
        $this->middleware('permission:add_catalog_category')->only('create');
        $this->middleware('permission:delete_catalog_category')->only('destroy');
        $this->middleware('permission:update_catalog_category')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = CatalogCategory::all();
        return view('productfeaturemodule::admin.catalog_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = CatalogCategory::whereNull('parent_id')->get();
        return view('productfeaturemodule::admin.catalog_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name_ar' => 'required|string|max:185',
            'name_en' => 'required|string|max:185',
            'image' => 'required|mimes:png,jpg,jpeg',
            'parent_id' => 'nullable|exists:catalog_categories,id'
        ]);

        $data = $request->only('name_ar', 'name_en', 'parent_id');
        $data['image'] = $this->upload($request->file('image'), 'catalog_category');
        CatalogCategory::create($data);
        return redirect()->to('admin/catalog_category')->with('success', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $categories = CatalogCategory::whereNull('parent_id')->get()->except($id);
        $category = CatalogCategory::find($id);
        return view('productfeaturemodule::admin.catalog_category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required|string|max:185',
            'name_en' => 'required|string|max:185',
            'parent_id' => 'nullable|exists:catalog_categories,id'
        ]);

        $data = $request->only('name_ar', 'name_en', 'parent_id');
        $category = CatalogCategory::find($id);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg',
            ]);
            $data['image'] = $this->upload($request->file('image'), 'catalog_category');
            if (File::exists(public_path('images/catalog_category/' . $category->image))) {
                File::delete(public_path('images/catalog_category/' . $category->image));
            }
        }

        if ($category->children()->count()) {
            $data['parent_id'] = null;
        }

        $category->update($data);
        return redirect()->to('admin/catalog_category')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        if (CatalogCategory::where('parent_id', $id)->count() > 0) {
            return back()->with('deleted', 'faild');
        }
        CatalogCategory::where('id', $id)->delete();
        return back()->with('deleted', 'success');
    }
}
