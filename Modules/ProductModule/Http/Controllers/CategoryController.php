<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Repository\CategoryRepository;
use Modules\ProductModule\Http\Requests\CategoryRequest;
use Modules\ConfigModule\Entities\Currency;
use Modules\ProductFeatureModule\Entities\Option;
use Modules\ProductModule\Entities\CategoryOption;
use Modules\CommonModule\Helper\ApiResponseHelper;
use App\Exports\CategoryExport;
use App\Imports\CategoryImport;
use Modules\CommonModule\Helper\UploaderHelper;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    use ApiResponseHelper;

    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth:admin,is_admin');

        $this->middleware('permission:show_category')->only('index');
        $this->middleware('permission:add_category')->only('create');
        $this->middleware('permission:delete_category')->only('destroy');
        $this->middleware('permission:update_category')->only(['edit', 'update']);

        $this->categoryRepository = $categoryRepository;


    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->findAllCategories();
        return view('productmodule::admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->findCategoriesDosnotHaveProducts();
        $options = Option::all();
        return view('productmodule::admin.category.create', compact('categories', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $category_data = $request->except('_token', 'photo','banner', 'option_id');

        $category = $this->categoryRepository->saveCategory($category_data, $request->file('photo'), $request->file('banner'));
        if ($request->option_id != null)
            $categories = $this->categoryRepository->saveCategoryOption($category->id, $request->option_id);

        return redirect('admin/category')->with('success', 'success');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findCategoryById($id);

        return view('productmodule::admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {


        $categories = $this->categoryRepository->findCategoriesDosnotHaveProducts();
        $category = $this->categoryRepository->findCategoryById($id);
        $options = Option::all();

        $selectedOptions = ($category->options->count() > 0) ? $category->options->pluck('id')->toArray() : [];

        return view('productmodule::admin.category.edit', compact('categories', 'category', 'options', 'selectedOptions'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {


        $data = $request->except('_token', '_method');
        $category = $this->categoryRepository->findCategoryById($id);

        $status = $this->categoryRepository->updateCategory($category, $data);
        CategoryOption::where('category_id', $category->id)->delete();
        if ($request->option_id != null)
            $categories = $this->categoryRepository->saveCategoryOption($category->id, $request->option_id);


        $status = ($status) ? 'updated' : 'failed';
        return redirect('admin/category')->with('updated', $status);

    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $status = $this->categoryRepository->deleteCategory($id);
        $status = ($status) ? 'deleted' : 'failed';
        return redirect('admin/category')->with('deleted', $status);
        //
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
                $this->categoryRepository->bulkStatus($ids, 1);
                break;
            case 'de-active':
                $this->categoryRepository->bulkStatus($ids, 0);
                break;
            case 'delete':
                $failed = bulkDelete('categories', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }

    public function saveSelectedCategory(Request $request)
    {
        $status = ($request->status == 'true') ? 1 : 0;
        if ($status == 0) {
            $status = $this->categoryRepository->saveSelectedCategory($request->id, $status);
            return $this->setCode(200)->setSuccess(__('commonmodule::swal.edited'))->send();
        } else {

            $selected_category = $this->categoryRepository->getSelectedCategory();
//      if($selected_category->count() < 3)
//      {
            $status = $this->categoryRepository->saveSelectedCategory($request->id, $status);
            return $this->setCode(200)->setSuccess(__('commonmodule::swal.edited'))->send();
//      }
//      else
//       return $this->setCode(201)->setError(__('productmodule::admin.in_home_limit'))->send();
        }

    }

    public function setCategory(CategoryRequest $request)
    {
        $category_data = $request->except('_token', 'photo', 'option_id');

        $category = $this->categoryRepository->saveCategory($category_data, $request->file('photo'));
        if ($request->option_id != null)
            $categories = $this->categoryRepository->saveCategoryOption($category->id, $request->option_id);

        $categories = $this->categoryRepository->findCategoriesDosnotHaveChildern();
        return $this->setCode(200)->setData($categories)->send();

    }

    public function uploadCategory(Request $request)
    {
        $request->validate(['category' => 'required|file']);
        Excel::import(new CategoryImport, $request->file('category'));
        return redirect()->back()->with('success', 'success');
    }

    public function downloadCategory(Excel $excel)
    {
        return Excel::download(new CategoryExport, 'Categories.xlsx');


    }

}
