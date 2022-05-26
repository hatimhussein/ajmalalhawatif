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

    Route::get('config', 'ConfigModuleController@config');
    Route::post('update-config', 'ConfigModuleController@updateConfig');
    Route::post('update-config-array', 'ConfigModuleController@updateConfigArray');
    Route::post('update-config-array-share', 'ConfigModuleController@updateConfigArrayShare');
    Route::post('update-config-insurance', 'ConfigModuleController@updateInsuranceConfig');
    Route::get('seo/script', 'SeoController@getScripts');
    Route::post('update-seo-script', 'SeoController@updateSeo');
    Route::post('update-sms-settings', 'ConfigModuleController@updateSmsSettings')->name('update-sms-settings');

    Route::resource('voucher', 'VoucherController');
    Route::post('voucher/bulk', 'VoucherController@bulk')->name('voucher.bulk');

    Route::resource('slider', 'SliderController');

    Route::resource('advertisment', 'AdvertismentController');
    Route::post('changeAdvertise', 'AdvertismentController@changeAdvertise')->name('changeAdvertise');

    Route::resource('payment-method', 'PaymentMethodController');
    Route::resource('shipping-method', 'ShippingMethodController');
    Route::resource('currency', 'CurrencyController');
    Route::post('update-deafult-currency', 'CurrencyController@setDefaultCurrency');
    Route::resource('newsletter', 'NewsletterController')->middleware('permission:newsletter');
    Route::resource('seo', 'SeoController');

    Route::resource('site_colors', 'ColorController');
    Route::resource('labels', 'LabelsController')->only(['index', 'store']);
    Route::get('tax', 'TaxController@index');
    Route::get('update-tax-status', 'TaxController@saveTaxStatus');
    Route::get('update-tax_shipping', 'TaxController@saveTaxShipping');
    Route::get('update-tax_product', 'TaxController@saveTaxProduct');
    Route::post('update_other_country_tax', 'TaxController@saveOtherCountryTax');
    Route::post('update_country_tax', 'TaxController@saveCountryTax');

    Route::resource('news', 'NewsController')->except('show');
    Route::get('menu', 'MenuLinkController@index')->name('menu.index');
    Route::put('menu/{id}', 'MenuLinkController@update');


    Route::resource('notification-settings', 'NotificationBodyController')->only(['index', 'update']);

    Route::get('invoice-status', 'ConfigModuleController@updateInvoiceStatus');
    Route::post('invoice-status', 'ConfigModuleController@updateInvoiceStatusStore');
});

Route::get('/about', "ConfigModuleController@About");
Route::get('/config/{id}', "ConfigModuleController@configDetails");


Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back();
});

Route::get('change-currency/{id}', 'CurrencyController@changeCurrency');

Route::post('check-code', 'VoucherController@checkCode');

Route::get('test123', function (){
    dd(secEnv('DB_DATABASE'));
});
