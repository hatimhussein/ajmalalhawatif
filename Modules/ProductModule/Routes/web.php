<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::post('category/setCategory', 'CategoryController@setCategory');
    Route::resource('category', 'CategoryController');
    Route::post('category/bulk', 'CategoryController@bulk')->name('category.bulk');

    Route::resource('product', 'ProductModuleController');
    Route::get('deleted-products', 'ProductModuleController@deletedProducts')->name("deleted_products");
    Route::put('restore-product/{product}', 'ProductModuleController@restoreProduct')->name("restore_product");

    Route::post('product/bulk', 'ProductModuleController@bulk')->name('product.bulk');

    Route::post('delete-product-attr', 'ProductModuleController@deleteProductAttribute');

    Route::post('update-product', 'ProductModuleController@updateProduct');
    Route::get('product/{product}/delete_video', 'ProductModuleController@deleteProductVideo')->name("delete_prod_vid");

    Route::post('save-selected-category', 'CategoryController@saveSelectedCategory');
    Route::delete('product/image/{id}', 'ProductModuleController@deleteProductImage');
    Route::post('uploadproducts', 'ProductModuleController@uploadProducts');
    Route::get('downloadproducts', 'ProductModuleController@downloadProducts');
    Route::get('downloadcategory', 'CategoryController@downloadCategory');
    Route::post('uploadcategory', 'CategoryController@uploadCategory');
    Route::get('get-combination', 'ProductModuleController@getCombination');

    Route::get('test-map-address', 'ProductModuleController@testMapAddress');

});

Route::get('get-product-combinations/{id}', 'ProductModuleController@getProductCombinations');


Route::middleware('is_not_ban')->group(function () {

    Route::get('category/{id?}', 'FilterController@getCategoryProducts')->middleware('restrict.category');
    Route::get('all_products', 'FilterController@getAllProducts')->middleware('restrict.category');

    Route::get('latest_products', 'ProductModuleController@latestProducts');

    Route::get('best_seller_products', 'ProductModuleController@bestSellerProducts');

    Route::get('product-details/{id}', 'ProductModuleController@productDetails')->middleware('restrict.product');

    Route::get('discount-products', 'ProductModuleController@discountProducts');

    Route::get('/products/autocomplete', 'ProductModuleController@autocompleteSearch');

    Route::get('search/{word?}', 'FilterController@search');

    Route::get('brand-products/{id?}', 'FilterController@getBrandProducts');

    Route::post('get-combination', 'ProductModuleController@getCombination');

    Route::post('save-review', 'ProductModuleController@saveReview');

    Route::get('autocomplete-names-search', 'ProductModuleController@dorplistSearch');

});


Route::get('test', function(){
//    $str = "a wea of";
//    $new_str = str_split($str);
//    $count = 0;
//    $letters = ['a', 'e', 'i', 'o'];
//    foreach ($new_str as $letter){
//        if(in_array($letter, $letters)){
//            echo $letter;
//            $count++;
//        }
//    }
//    echo $count;
});
