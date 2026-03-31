<?php

namespace Modules\ProductModule\Http\Controllers;

use App\Imports\ProductsImport;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\ConfigModule\Entities\Config;
use Modules\ProductModule\Entities\Product;
use Modules\CommonModule\Helper\ProductHelper;
use Modules\OrderModule\Entities\OrderProduct;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductModule\Entities\ProductImage;
use Modules\ProductFeatureModule\Entities\Option;
use Modules\UserModule\Repository\UserRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\ProductModule\Contracts\StrategyContext;
use Modules\ProductFeatureModule\Entities\OptionValue;
use Modules\ProductModule\Http\Requests\ProductRequest;
use Modules\ProductModule\Repository\ProductRepository;

use Modules\ProductModule\Repository\CategoryRepository;

use Modules\ProductFeatureModule\Repository\OfferRepository;


class ProductModuleController extends Controller
{
    use ApiResponseHelper;
    use ProductHelper;

    private ProductRepository $productRepository;

    public function __construct(ProductRepository  $productRepository,
                                CategoryRepository $categoryRepository,
                                OfferRepository    $offerRepository,
                                UserRepository     $userRepository)
    {
        $this->middleware('permission:show_product')->only('index');
        $this->middleware('permission:add_product')->only('create');
        $this->middleware('permission:delete_product')->only('destroy');
        $this->middleware('permission:update_product')->only(['edit', 'update']);

        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->offerRepository = $offerRepository;
        $this->userRepository = $userRepository;


    }

    function getProductCombinations($id)
    {
        $product = $this->productRepository->findProductById($id);
        $combinations = $product->combinations()->select(['combination_values', 'combination_names'])->get()->toArray();
        return $this->setCode(200)->setData($combinations)->send();
    }

    function getCombination(Request $request)
    {
        $all_discounts = [];
        $result = $this->productRepository->getCombination($request->except('_token'));
        $product_info = $this->productRepository->findProductById($request->product_id);
        $discounts = $product_info->discounts->where('start_date', "<=", date('Y-m-d'))->where('end_date', ">=", date('Y-m-d'));


        foreach ($discounts as $discount_) {
            $all_discounts[$discount_->discount_quantity] = ProductHelper::calDiscountAmount($product_info->product_price, $discount_);
        }

        $data['result'] = $result;
        $data['currency'] = session('currency');
        $data['all_discounts'] = $all_discounts;


        return $this->setCode(200)->setData($data)->send();
    }

    public function productDetails($id)
    {
        $product_info = $this->productRepository->findProductById($id);

        if (!$product_info)
            return redirect()->back();

        $product_info = $this->productRepository->getRelatedProducts($product_info);

        $wish_list = $this->userRepository->wishList();

        $socialShare = Config::where('category_id', 10)->get();
        $all_discounts = $product_info->discounts->where('start_date', "<=", date('Y-m-d'))->where('end_date', ">=", date('Y-m-d'));

        return view('productmodule::front.productDetails', compact('product_info', 'socialShare', 'wish_list', 'all_discounts'));
    }

    public function deletedProducts()
    {
        $products = $this->productRepository->getDeletedProducts();

        return view('productmodule::admin.product.deleted_products', compact('products'));
    }

    public function restoreProduct($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->back()->with('product_updated', 'updated');
    }

    public function autocompleteSearch()
    {
        $products = $this->productRepository->autocompleteSearch();

        return $this->setCode(200)->setData($products)->send();

    }


    public function index()
    {
        $products = $this->productRepository->findAllProducts();

        return view('productmodule::admin.product.index', compact('products'));
    }

    public function latestProducts()
    {
        $num_latest_products = Config::where('key', 'num_latest_products')->first()->value_ar;
        $products = $this->productRepository->latestProducts($num_latest_products);

        $wish_list = $this->userRepository->wishList();

        return view('productmodule::front.latestProducts', compact('products', 'wish_list'));
    }


    public function create()
    {
        $categories = $this->categoryRepository->findCategoriesDosnotHaveChildern();
        $options = Option::all();
        $attributes = Attribute::all();
        $brands = Brand::all();
        return view('productmodule::admin.product.create', compact('categories', 'options', 'attributes', 'brands'));
    }

    public function store(ProductRequest $request)
    {

        $data = $request->except('_token');

        //validate attributes if discount
        if (isset($request->discount)) {
            request()->validate([
                'discount.*.discount_type' => 'bail|required',
                'discount.*.discount_value' => 'required|numeric',
                'discount.*.discount_quantity' => 'required|numeric',
                'discount.*.start_date' => 'required_unless:discount.*.end_date,|date|nullable',
                'discount.*.end_date' => 'required_unless:discount.*.start_date,|after_or_equal:discount.*.start_date|nullable'
            ]);
        }

        //validate attributes if presented
        if (isset($request->attributes)) {
            request()->validate([
                'attributes.*.attribute_value' => 'required',
                'attributes.*.attribute_id' => 'required',
            ]);
        }

        // save product_operations
        $product = $this->productRepository->saveProduct($data, $request->file('product_photo'), $request->file('product_images'), $request->file('video'));

        return $this->setCode(200)->setData($product)->send();
    }

    public function show($id)
    {
        return view('productmodule::show');
    }

    public function edit($id)
    {
        $categories = $this->categoryRepository->findCategoriesDosnotHaveChildern();
        $product_info = $this->productRepository->findProductById($id);

        // if product type is combination
        $options = Option::all();
        $optionsValues = OptionValue::WhereIn('option_id', $product_info->option()->pluck('option_id'))->get();
        $optionsValues = $optionsValues->groupBy('option_id');

        $attributes = Attribute::all();
        $brands = Brand::all();

        return view('productmodule::admin.product.edit', compact('product_info', 'categories', 'options', 'attributes', 'brands', 'optionsValues'));
    }

    public function update(Request $request, $id)
    {
        //

        $product = Product::find($id);
        if (!$product)
            return false;

        $data = $request->except('_token');

        //validate attributes if discount

        if (isset($request->discount)) {
            request()->validate([
                'discount.*.discount_type' => 'bail|required',
                'discount.*.discount_value' => 'required|numeric',
                'discount.*.discount_quantity' => 'required|numeric',
                'discount.*.start_date' => 'required_unless:discount.*.end_date,|date|nullable',
                'discount.*.end_date' => 'required_unless:discount.*.start_date,|after_or_equal:discount.*.start_date|nullable'

            ]);

        }

        //validate attributes if presented

        if (isset($request->attributes)) {
            request()->validate([
                'attributes.*.attribute_value' => 'required',
                'attributes.*.attribute_id' => 'required',

            ]);

        }

        // save product_operations
        $data = $this->productRepository->updateProduct($product, $data, $request->file('product_photo'), $request->file('product_images'));

        return $this->setCode(200)->setData($data)->send();

    }

    public function destroy($id)
    {
        $status = $this->productRepository->deleteProduct($id);
        if ($status) {
            return redirect('admin/product')->with('product_deleted', 'deleted');
        } else {
            return redirect('admin/product')->with('product_deleted', 'failed');
        }
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
                $this->productRepository->bulkStatus($ids, 1);
                break;
            case 'de-active':
                $this->productRepository->bulkStatus($ids, 0);
                break;
            case 'delete':
                $failed = bulkDelete('products', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));

        return back()->with('success', 'success');
    }


    function deleteProductAttribute(Request $request)
    {
        $deleted = $this->productRepository->deleteProductAttribute($request->attr_id);
        dd($deleted);
    }

    function updateProduct(Request $request)
    {
        $data = $request->except('_token', 'r_type', 'id');
        $strategyContextS = new StrategyContext($request->r_type);
        $status = $strategyContextS->UpdateProductData($data, $request->id);

//        dd($status);
    }


    function discountProducts()
    {
        $products = $this->productRepository->discountProducts();
        $offers = $this->offerRepository->allOffers();
        $wish_list = $this->userRepository->wishList();

        return view('productmodule::front.discountsProducts', compact('products', 'offers', 'wish_list'));
    }


    public function offerProducts($id)
    {
        $offer = $this->offerRepository->offerProducts($id);

        return view('productfeaturemodule::front.offerDetails', compact('offer'));
    }

    function bestSellerProducts()
    {

        $order_products = OrderProduct::groupBy("product_id")->orderByRaw('SUM(quantity) DESC')->limit(24)->with('product', 'product.discounts')->get();


        $wish_list = $this->userRepository->wishList();

        // $products = \DB::table('products')
        //             ->join('order_products','products.id','=','order_products.product_id')
        //             ->selectRaw('products.*, COALESCE(sum(order_products.quantity),0) total')
        //             ->groupBy('products.id')
        //             ->orderBy('total','desc')
        //             ->take(5)
        //             ->get();


        return view('productmodule::front.bestSellerProducts', compact('order_products', 'wish_list'));

    }

    public function saveReview(Request $request)
    {

        $request->validate([
            'review' => 'required',
            'stars' => 'required',
        ]);
        if (Auth::guest()) {
            $request->validate([
                'name' => 'required',
            ]);
        }

        $data = $request->except('_token');
        $this->productRepository->saveReview($data);
        return $this->setCode(200)->setSuccess(__('commonmodule::validation.saved'))->send();
    }

    public function dorplistSearch()
    {
        $tempnames = $this->productRepository->findAllProductsNames();
        $names_en = array_values($tempnames->toArray());
        $names_ar = array_keys($tempnames->toArray());
        $names = array_merge($names_ar, $names_en);

        $names = array_unique($names);

        return $this->setCode(200)->setData($names)->send();

    }


    public function deleteProductImage($id)
    {
        $productImage = ProductImage::find($id)->delete();
        if ($productImage) {
            return redirect()->back()->with('deleted', 'deleted');
        } else {
            return redirect()->back()->with('deleted', 'image_failed');
        }
    }


    public function uploadProducts(Request $request)
    {
        $request->validate(['products' => 'required|file']);
        Excel::import(new ProductsImport, $request->file('products'));
        return redirect()->back()->with('success', 'success');
    }

    public function downloadProducts(Excel $excel)
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function deleteProductVideo(Product $product)
    {
        $product->update(['video' => '']);
        if ($product) {
            return $this->setCode(200)->send();
        } else {
            return $this->setCode(422)->send();
        }
    }

    public function testMapAddress()
    {
        $latitude = '38.897952';
        $longitude = '-77.036562';

        if(!empty($latitude) && !empty($longitude)){
            //Send request and receive json data by address
            $geocodeFromLatLong = file_get_contents('http://maps.google.com/maps/api/geocode/json?latlng=' . $latitude . ',' . $longitude);
            $output = json_decode($geocodeFromLatLong);

            dd($output);
            $status = $output->status;

            //Get address from json data
            $address = ($status=="OK")?$output->results[1]->formatted_address:'';

            //Return address of the given latitude and longitude
            if(!empty($address)){
                return $address;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
