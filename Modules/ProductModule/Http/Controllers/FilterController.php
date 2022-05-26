<?php

namespace Modules\ProductModule\Http\Controllers;

use DB;
use Modules\CommonModule\Helper\ProductHelper;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\ProductModule\Repository\CategoryRepository;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\Category;
use Modules\ProductFeatureModule\Entities\OptionValue;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductModule\Entities\CategoryOption;
use Modules\ProductModule\Services\FilterService;
use Modules\UserModule\Repository\UserRepository;


class FilterController extends Controller
{

    private CategoryRepository $categoryRepository;
    private ProductRepository $productRepository;
    private UserRepository $userRepository;
    private FilterService $filterService;

    public function __construct(ProductRepository $productRepository,
                                CategoryRepository $categoryRepository,
                                UserRepository $userRepository,
                                FilterService $filterService)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
        $this->filterService = $filterService;

    }

    public function getAllProducts(Request $request)
    {
        $wish_list = $this->userRepository->wishList();

        $query = $this->filterService->getFilterQuery($request);

        $products = $query->paginate(12);

//        dd($products[0]->categories[0]);

        if ($request->ajax()) {
            if (isset($request->typereturn) && $request->typereturn == 5) {
                if ($products->count() > 0) return view('productmodule::front.products', compact('products', 'wish_list'));
                return 0;
            } else {
                return view('productmodule::front.content.productCategoryRender', compact('products', 'wish_list'));
            }
        } else {
            $brands = Brand::whereHas('products')->orderBy('sort_order', 'asc')->get();
            return view('productmodule::front.allProducts', compact('products', 'brands', 'wish_list'));
        }
    }


    public function getCategoryProducts(Request $request)
    {

        $wish_list = $this->userRepository->wishList();

        $query = $this->filterService->getFilterQuery($request);

        $id = $request->id;

        $category = $this->categoryRepository->findCategoryById($id);
        if (!$category) {
            return redirect('/');
        }

        $cat_ids = $category->child->pluck('id')->toArray();
        array_push($cat_ids, (int)$id);

        $products = $query->whereIn('parent_id', $cat_ids)->paginate(12);

        if ($request->ajax()) {
            $products = $query->paginate(12);
            if (isset($request->typereturn) && $request->typereturn == 5) {
                if ($products->count() > 0) return view('productmodule::front.products', compact('products', 'wish_list'));
                return 0;
            } else {
                return view('productmodule::front.content.productCategoryRender', compact('products', 'wish_list'));
            }
        } else {
            $dd = DB::table('products')
                ->join('categories', function ($join) {
                    $join->on('products.parent_id', '=', 'categories.id')
                        ->where('categories.id', '=', request()->id);
                })->join('brands', 'products.brand_id', '=', 'brands.id')
                ->select(
                    'brands.id as id'
                )->get();


            $brands = [];
            foreach ($dd->unique()->toArray() as $brand) {
                $brands[] = $brand->id;
            }

            $cat_brands = Brand::whereIn('id', $brands)->get();

            return view('productmodule::front.categoryProducts', compact('products', 'category', 'cat_brands', 'wish_list'));
        }
    }


    public function getBrandProducts(Request $request)
    {

        $wish_list = $this->userRepository->wishList();

        $query = $this->filterService->getFilterQuery($request);

        $id = $request->id;

        $products = $query->where('brand_id', $id)->paginate(12);

        if ($request->ajax()) {
            if (isset($request->typereturn) && $request->typereturn == 5) {
                if ($products->count() > 0) return view('productmodule::front.products', compact('products', 'wish_list'));
                return 0;
            } else {
                return view('productmodule::front.content.productCategoryRender', compact('products', 'wish_list'));
            }
        } else {
            $brands_info = Brand::where('id', $id)->with(['categories', 'categories.options', 'categories.options.optionValues'])->first();
            $brandcategories = $brands_info->categories->unique();

            return view('productmodule::front.brandProducts', compact('products', 'brandcategories', 'brands_info', 'wish_list'));
        }
    }


    public function search(Request $request)
    {
        $wish_list = $this->userRepository->wishList();

        $word = convertArabicNumToEnglish($request->word);

        if ($word == null) {
            return redirect('/');
        }

        $exist_product = Product::where('name_en', 'like', '%' . $word . '%')->orWhere('name_ar', 'like', '%' . $word . '%')
            ->orWhere('product_code', 'like', '%' . $word . '%')->orWhere('id', 'like', '%' . $word . '%');

        if ($exist_product->count() == 1) {
            return redirect("/product-details/" . $exist_product->first()->id);
        }

        $query = $this->filterService->getFilterQuery($request);
        $data = $this->getData($query, $word);
        $products = $data['products'];

        if ($products->count() < 1){
            $products = Product::where('product_code', 'like', '%' . $word . '%')->paginate(12);
        }

        if ($request->ajax()) {
            if (isset($request->typereturn) && $request->typereturn == 5) {
                if ($products->count() > 0) return view('productmodule::front.products', compact('products', 'wish_list'));
                return 0;
            } else {
                return view('productmodule::front.content.productCategoryRender', compact('products', 'wish_list'));
            }
        } else {
            $flag_type = $data['flag_type'];
            $cat_ids = array_unique($data['cat_ids']);
            $scategories = $data['scategories'];

            $dd = DB::table('products')
                ->join('categories', function ($join) use ($cat_ids) {
                    $join->on('products.parent_id', '=', 'categories.id')
                        ->whereIn('categories.id', $cat_ids);
                })->join('brands', 'products.brand_id', '=', 'brands.id')
                ->select(
                    'brands.id as id',
                )->get();

            $brands = [];
            foreach ($dd->unique()->toArray() as $brand) {
                $brands[] = $brand->id;
            }
            $cat_brands = Brand::whereIn('id', $brands)->get();

            return view('productmodule::front.search', compact('products', 'scategories', 'cat_brands', 'flag_type', 'word', 'wish_list'));
        }
    }


    function getData($query, $word)
    {
        $scategories = $this->categoryRepository->searchCategoryByName($word);
        if ($scategories->count() > 0) {
            $main_ids = $scategories->pluck('id')->toArray();
            foreach ($scategories as $category) {
                if ($category->child->count() > 0)
                    $cat_ids = array_merge($category->child->pluck('id')->toArray());
            }

            if (isset($cat_ids))
                $cat_ids = array_unique(array_merge($cat_ids, $main_ids));
            else $cat_ids = $scategories->pluck('id')->toArray();

            $products = $query->whereIn('parent_id', $cat_ids)->paginate(12);
            $flag_type = 1;
        } else {
            $products = $this->productRepository->searchProductByName($query, $word);
            $cat_ids = $products->pluck('parent_id')->toArray();
            $scategories = Category::whereIn('id', $cat_ids)->get();
            $flag_type = 2;
        }

        $data['flag_type'] = $flag_type;
        $data['cat_ids'] = $cat_ids;
        $data['products'] = $products;
        $data['scategories'] = $scategories;

        return $data;
    }

}
