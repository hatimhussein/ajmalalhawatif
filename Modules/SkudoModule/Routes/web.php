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

use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::resource('skudo-returns', 'ReturnAdminController')->names('skudo.returns')->only(['index', 'update', 'destroy']);
    Route::resource('skudo-return-reason', 'ReturnReasonController')->names('skudo.reasons')->except(['show']);

    Route::resource('skudo-warranty', 'WarrantyAdminController')->names('skudo.warranty')->only(['index', 'edit', 'update', 'destroy']);
    Route::get('skudo-warranty/export', 'WarrantyAdminController@export')->name('skudo.warranty.export');

    Route::resource('skudo-insurance', 'InsuranceAdminController')->names('skudo.insurance')->only(['index', 'edit', 'update', 'destroy']);
    Route::get('skudo-insurance/export', 'InsuranceAdminController@export')->name('skudo.insurance.export');
    Route::get('skudo-insuranceServer', 'InsuranceAdminController@insuranceServer')->name('skudo.insurance.insuranceServer');
    Route::get('skudo-insurance/modal/{insurance}', 'InsuranceAdminController@showModal')->name('skudo.insurance.show.modal');

    Route::resource('skudo-serial-numbers', 'SerialNumberController')->names('skudo.serial-numbers');
});

/**
 * @Front_Routes - Guest Access (No Login Required)
 */
// Routes accessible to guests (no authentication required)
Route::get('skudo-warranty-new', function () {
    return view('skudomodule::front.warranty.new');
})->name('front.skudo.warranty.new');

Route::resource('skudo-warranty', 'WarrantyController')->names('front.skudo.warranty');
Route::get('skudo-warranty-insurance/{insurance}', 'WarrantyController@findInsurance')->name('skudo.warranty.insurance');

Route::resource('skudo-insurance', 'InsuranceController')->names('front.skudo.insurance');

// البحث في الأرقام التسلسلية
Route::get('skudo-serial-numbers/search', 'SerialNumberController@search')->name('front.skudo.serial-numbers.search');

/**
 * @Front_Routes - Authenticated Users Only
 */
Route::middleware(['auth', 'is_active'])->group(function () {
    Route::get('skudo-returns/orders', 'ReturnController@myOrders')->name('front.skudo.returns.orders');
    Route::resource('skudo-returns', 'ReturnController')->names('front.skudo.returns')->only(['index', 'show', 'store']);
});

