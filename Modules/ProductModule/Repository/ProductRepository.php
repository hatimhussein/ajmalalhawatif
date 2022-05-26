<?php

namespace Modules\ProductModule\Repository;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\CommonModule\Helper\BaseHelper;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\PoductAttribute;
use Modules\ProductModule\Entities\ProductDiscount;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\ProductFeatureModule\Entities\Offers;
use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Entities\ProductCombination;
use Modules\ProductFeatureModule\Entities\OptionValue;
use Modules\ProductModule\Entities\ProductReview;

use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductModule\Scopes\ProductFrontScope;


class ProductRepository
{

    use UploaderHelper;
    use BaseHelper;


    function getCombination($data)
    {

        $option = trim($data['option'], ',');
        $combinations = ProductCombination::where('product_id', $data['product_id'])->where('combination_values', 'like', '%' . $option . '%')->get();
        $option_value_ids = $combinations->pluck('combination_values');
        $ids = [];
        foreach ($option_value_ids->toArray() as $key => $value) {
            $arr = explode(',', $value);
            foreach ($arr as $key => $id) {
                array_push($ids, $id);
            }
        }

        $ids = array_unique($ids);
        $values = OptionValue::whereIn('id', $ids)->where('option_id', $data['follow_option'])->get();
        $data['values'] = $values;
        $data['combinations'] = $combinations;
        return $data;

    }


    public function getRelatedProducts(Product $product): Product
    {

        $category = ($product->category->parent_id) ? $product->category->parent()->first() : $product->category;
        $category->load(['directProducts', 'products' => function ($q) {
            $q->withoutGlobalScope('status');
        }]);
        $product->relatedProducts = $category->products->merge($category->directProducts);
        $product->relatedProducts = $product->relatedProducts->filter(function ($item) use ($product) {
            return ($item->id != $product->id);
        });
        return $product;
    }

// find products
    function findProductById($id, $with = ['category', 'option', 'option_value', 'combinations', 'images', 'attributes', 'discounts', 'reviews', 'reviews.user'])
    {
        return Product::withoutGlobalScope(ProductFrontScope::class)->where('id', $id)->with($with)->first();
    }

    function findProductDataById($id)
    {
        return Product::where('id', $id)->get();
    }

    function findAllProductsToOffers($columns = ['*'])
    {
        return Product::all($columns);
    }

    function getDeletedProducts()
    {
        return Product::onlyTrashed()->get();
    }

    function findAllProducts()
    {
        return Product::orderBy('id', 'desc')->with('category')->get();
    }

    function findAllProductsNames()
    {
        return Product::all()->pluck('name_en', 'name_ar');
    }

    function searchOfferProducts($search)
    {
        return Product::where('id', $search)
            ->orWhere('name_en', 'like', '%' . $search . '%')
            ->orWhere('name_ar', 'like', '%' . $search . '%')
            ->orWhere('product_code', $search)->get(['id', 'name_ar', 'name_en']);
    }


    function searchProductByName($query, $name)
    {
        return $query->where('name_en', 'like', '%' . $name . '%')->orWhere('name_ar', 'like', '%' . $name . '%')->paginate(12);
    }

    function searchProductName($name)
    {
        return Product::where('name_en', 'like', '%' . $name . '%')->orWhere('name_ar', 'like', '%' . $name . '%')->get();

    }

    function searchProductCode($product_code)
    {
        return Product::where('product_code', 'like' . '%' . $product_code . '%')->get();
    }

    function autocompleteSearch()
    {
        return Product::get('name_ar');
    }

    function latestProducts($num_products = 16)
    {
        return Product::orderBy('id', 'DESC')->with(['images', 'discounts', 'reviews'])->take( is_null($num_products) ? 16 : $num_products)->get();
    }

    // product discount with quantity 1 and in valid period

    function producstHasDiscount()
    {
        $now = date('Y-m-d');


        $products = Product::whereHas('discounts', function ($query) use ($now) {
            $query->where('discount_quantity', 1)
                ->where('start_date', "<=", $now)
                ->where('end_date', ">=", $now)->orderBy('id', 'desc');
        })->with(['discounts' => function ($query) use ($now) {
            $query->where('discount_quantity', 1)
                ->where('start_date', "<=", $now)
                ->where('end_date', ">=", $now);
        }, 'images', 'reviews'])->take(10)->get();

        return $products;
    }


// find product


// Save Product
    function saveProduct($main_data, $product_photo, $product_images, $video)
    {

        $flag = false;

        if ($main_data['type'] == 'simple') {
            request()->validate([
                'product_quantity' => 'bail|required|numeric',
            ]);


            $product = $this->saveProductMainData($main_data, $product_photo, $video);
            $flag = true;

        } //   if product  type is combination
        else if ($main_data['type'] == 'combination') {
            request()->validate([
                'combination_qty.*' => 'bail|required|numeric',
                'combination_price.*' => 'required|numeric',
                'options.*.option_id' => 'required',
                'combination_values' => 'required',
            ]);


            $product = $this->saveProductMainData($main_data, $product_photo, $video);
            $product->option()->createMany($main_data['options']);
            $this->saveProductOptionsValues($product, $main_data['combination_values']);
            $this->saveProductCombination($product, $main_data);
            $flag = true;

        }

        if ($flag) {

            if (isset($product_images))
                $this->saveProductImages($product, $product_images);

            if (isset($main_data['attributes']))
                $product->attributes()->sync($main_data['attributes']);

            if (isset($main_data['discount']))
                $product->discounts()->createMany($main_data['discount']);

        }

        // end

        return $product;

    }

    function saveProductMainData($data, $product_photo, $video)
    {
        $data['status'] = (isset($data['status'])) ? 1 : 0;
        $data['product_photo'] = $this->upload($product_photo, 'product');
        $data['video'] = ($video !== null) ? $this->uploadVideo($video, 'product') : '';

        try {
            parse_str(parse_url($data['yt_video'], PHP_URL_QUERY), $queries);
            $data['yt_video'] = $queries['v'];
        } catch (Exception $e) {
            $data['yt_video'] = null;
        }

        $data['viewed_levels'] = (isset($data['viewed_levels'])) ? implode('_', $data['viewed_levels']) : '';

        return Product::create($data);
    }

    function saveProductImages($product, $product_images)
    {
        $images = $this->uploadAlbum($product_images, 'product');

        $images = $this->prepareData($images, 'image');

        $product->images()->createMany($images);

        return true;
    }

    function updateProductImages($product, $data)
    {
        if (isset($data['product_images']))
            $this->saveProductImages($product, $data['product_images']);
        if (isset($data['product_photo']))
            $data['product_photo'] = $this->upload($data['product_photo'], 'product');
        if (isset($data['video']))
            $data['video'] = $this->uploadVideo($data['video'], 'product');

        $product->update($data);

    }

    function saveProductAttributes($product, $attributes)
    {
        $product->attributes()->attach($data['attributes']);

        return true;

    }

    function saveProductOptions($product, $options)
    {
        $product->option()->createMany($options);
        return true;
    }

    function saveProductOptionsValues($product, $combination_options_values)
    {
        $options_values = [];
        foreach ($combination_options_values as $key => $option_value) {
            foreach (explode(',', $option_value) as $key => $value) {
                if (in_array($value, $options_values)) continue;
                else array_push($options_values, $value);
            }
        }

        $options_values = $this->prepareData($options_values, 'option_value_id');

        $product->option_value()->createMany($options_values);


        // foreach ($options_values as $key => $option_value) {
        //   $product->option_value()->create(['option_value_id'=>$option_value]);
        // }


        return true;

    }

    function saveProductCombination($product, $data)
    {
        $temp_arr = [];
        foreach ($data['combination_values'] as $p_key => $option_value) {
            foreach (explode(',', $option_value) as $key => $value) {
                $id = $product->option_value()->where('option_value_id', $value)->first();
                array_push($temp_arr, $id->id);
            }

            // $main_data['combination_price'][$option_value]


            $dd = $product->combinations()
                ->create(['combination' => implode(',', $temp_arr),
                    'combination_quantity' => $data['combination_qty'][$option_value],
                    'combination_price' => $data['combination_price'][$option_value],
                    'combination_values' => $data['combination_values'][$p_key],
                    'combination_names' => $data['combination_names'][$option_value],
                    'options_ids' => $data['options_ids'][$option_value],

                ]);

            $temp_arr = [];

        }

        return true;

    }


    function updateProductCombinations($product, $data)
    {
        $product->option()->delete();
        $product->option_value()->delete();
        $product->combinations()->delete();

        $status1 = $product->option()->createMany($data['options']);
        $status2 = $this->saveProductOptionsValues($product, $data['combination_values']);
        $status3 = $this->saveProductCombination($product, $data);

        dd($status3);
    }

// End Save Product


// start update Product
    function updateProductAttributes($product, $data)
    {
        if (isset($data['attributes'])) $product->attributes()->sync($data['attributes']);
        else $product->attributes()->sync([]);
        return true;
    }

    function updateProductDiscount($product, $data)
    {

        $product->discounts()->delete();

        if (isset($data['discount']))
            $product->discounts()->createMany($data['discount']);

        return true;

    }

    function updateProductMainData($product, $data)
    {
        if (isset($data['viewed_levels'])) {
            $data['viewed_levels'] = implode('_', $data['viewed_levels']);
        }

        $product->update($data);
    }

// End update Product


    public function getCategoryProductsPaginate($cat_ids)
    {
        return Product::with('reviews')->whereIn('parent_id', $cat_ids)
            ->with(['images', 'discounts', 'reviews'])->orderBy('product_price')->paginate(12);

    }

    public function getBrandProductsPaginate($id)
    {
        return Product::whereIn('brand_id', $id)->with(['images', 'discounts', 'reviews'])->orderBy('product_price')->paginate(12);

    }


    public function getCategoryProductsAjax(Request $request)
    {

        $filters = [
            'category_id' => Input::get('id'),
            'drink' => Input::get('drink'),
        ];

        $products = Product::where(function ($query) use ($filters) {
            if ($filters['eye_color']) {
                $query->where('eye_color', '=', $filters['eye_color']);
            }
            if ($filters['smoke']) {
                $query->where('smoke', '=', $filters['smoke']);
            }

            if ($request->has('has_published_post')) {
                $users->where(function ($query) use ($request) {
                    $query->whereHas('posts', function ($query) use ($request) {
                        $query->where('is_published', $request->has_published_post);
                    });
                });
            }

        })->orderBy($sort_by, $sort_type)->paginate(12);


        return $data;
    }


    function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($this->checkInOrders($product)) {
            return false;
        } else {
            $product->option()->delete();
            $product->option_value()->delete();
            $product->combinations()->delete();
            $product->delete();
            return true;
        }

    }

    function checkInOrders($product)
    {
        if ($product->inOrders->count() > 0) {
            return true;
        } else {
            return false;
        }
    }


    function deleteAllOptionsAndCombinations($product)
    {
        $product->option()->delete();
        $product->option_value()->delete();
        $product->combinations()->delete();

        return true;
    }

    public function discountProducts()
    {
        $now = date('Y-m-d');

        $products = Product::whereHas('discounts', function ($query) use ($now) {
            $query->where('discount_quantity', '>=', 1)
                ->where('start_date', "<=", $now)
                ->where('end_date', ">=", $now)->orderBy('id', 'desc');
        })->with(['discounts' => function ($query) use ($now) {
                $query->where('discount_quantity', '>=', 1)
                    ->where('start_date', "<=", $now)
                    ->where('end_date', ">=", $now);
            }, 'images'])->get();

        return $products;
    }

    public function checkIfProductIsFounded()
    {
        $cart_data = app('cart_data');

        foreach ($cart_data as $item) {
            if ($item['combination_id'] != null) {
                $product = ProductCombination::where('product_id', $item['product_id'])->where('combination_names', $item['item_combination_name'])->first();

                if ($item['quantity'] <= 0 || $product->combination_quantity < $item['quantity']) {
                    $item['act_quantity'] = $product->combination_quantity;
                    return $item;
                }
            } else {
                $product = Product::where('id', $item['product_id'])->first();
                if ($item['quantity'] <= 0 || $product->product_quantity < $item['quantity']) {
                    $item['act_quantity'] = $product->product_quantity;

                    return $item;
                }

            }
        }


        $products_keys = array_unique(array_column($cart_data, 'product_id'));

        $actual_products = Product::whereIn('id', $products_keys)->get();

        if (count($products_keys) == $actual_products->count())
            return true;

        return false;
    }

    public function saveReview($data)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $data['name'] = $user->is_merchant ? $user->company_name : $user->first_name;
            $data['user_id'] = $user->id;
        }
        ProductReview::create($data);
    }

    public function getCategoryProducts($cat_ids)
    {
        return Product::where('parent_id', $cat_ids)->get();

    }


    public function bulkStatus($ids, $status)
    {
        return Product::whereIn('id', $ids)->update(['status' => $status]);
    }

}
