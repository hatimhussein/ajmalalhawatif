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
    Route::resource('returns', 'ReturnAdminController')->names('returns')->only(['index', 'update', 'destroy']);
    Route::resource('return_reason', 'ReturnReasonController')->names('reasons')->except(['show']);

    Route::resource('warranty', 'WarrantyAdminController')->names('warranty')->only(['index', 'edit', 'update', 'destroy']);
    Route::get('warranty/export', 'WarrantyAdminController@export')->name('warranty.export');

    Route::resource('insurance', 'InsuranceAdminController')->names('insurance')->only(['index', 'edit', 'update', 'destroy']);
    Route::get('insurance/export', 'InsuranceAdminController@export')->name('insurance.export');
    Route::get('insuranceServer', 'InsuranceAdminController@insuranceServer')->name('insurance.insuranceServer');
    Route::get('insurance/modal/{insurance}', 'InsuranceAdminController@showModal')->name('insurance.show.modal');
});

/**
 * @Front_Routes
 */
Route::middleware(['auth', 'is_active'])->group(function () {
    Route::get('returns/orders', 'ReturnController@myOrders')->name('front.returns.orders');
    Route::resource('returns', 'ReturnController')->names('front.returns')->only(['index', 'show', 'store']);

    Route::resource('warranty', 'WarrantyController')->names('front.warranty');
    Route::get('warranty-insurance/{insurance}', 'WarrantyController@findInsurance')->name('warranty.insurance');
    Route::get('warranty-new', function () {
        return view('warrantymodule::front.warranty.new');
    })->name('front.warranty.new');

    Route::resource('insurance', 'InsuranceController')->names('front.insurance');

});

