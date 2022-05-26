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
    Route::post('setBrand', 'BrandController@setBrand');
    Route::post('setAttribute', 'AttributeController@setAttribute');
    Route::post('setOption', 'OptionController@setOption');
    Route::post('setValue', 'OptionValueController@setValue');
    Route::get('downloadBrand', 'BrandController@downloaBbrands');
    Route::post('uploadBrand', 'BrandController@uploadBbrands');

    Route::resource('brand', 'BrandController');
    Route::post('brand/bulk', 'BrandController@bulk')->name('brand.bulk');

    Route::resource('attribute', 'AttributeController');
    Route::post('attribute/bulk', 'AttributeController@bulk')->name('attribute.bulk');

    Route::resource('option', 'OptionController');
    Route::get('option-with-ids', 'OptionController@getOptionsByIds');

    Route::resource('offers', 'OfferController');
    Route::post('offer/bulk', 'OfferController@bulk')->name('offer.bulk');

    Route::resource('option-value', 'OptionValueController');
    Route::resource('delivery_time', 'DeliveryTimeController');
    Route::get('offers/search/product', 'OfferController@SearchOfferProduct');

    Route::resource('catalog_category', 'CatalogCategoryController')->except('show');
    Route::resource('catalog', 'CatalogController')->except('show');
    Route::post('catalog/bulk', 'CatalogController@bulk')->name('catalog.bulk');
});


Route::get('offers', 'OfferController@offers');

Route::get('offer/{id}', 'OfferController@offerProducts');

Route::get('/catalog', 'CatalogController@front')->name('front.catalog');
Route::get('filter_get_all','CatalogController@FilterGetAll')->name('front.catalog.filter_get_all');
Route::get('filter_catalog_by_brand/{brand_id}','CatalogController@FilterCatalogByBrand')->name('front.catalog.filter_by_brand');
Route::get('filter_catalog_by_category/{cat_id}','CatalogController@FilterCatalogByCategory')->name('front.catalog.filter_by_category');
Route::get('filter_catalog_by_sub_cat/{sub_cat}','CatalogController@FilterCatalogBySubCategory')->name('front.catalog.filter_by_sub_category');
Route::get('catalog/{id}/download', 'CatalogController@download')->name('front.catalog.download');
