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

Route::prefix('admin')->group(function () {

    Route::get('/', 'AdminModuleController@dashboard');
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin_login');
    Route::post('/login', 'AdminLoginController@login')->name('admin_login');
    Route::get('/admin-logout', 'AdminLoginController@adminLogout')->name('adminLogout');


    Route::resource('admins', 'AdminModuleController');
    Route::get('merchants/getNew', 'MerchantsController@getNewCount');
    Route::resource('merchants', 'MerchantsController');
    Route::post('merchant/bulk', 'MerchantsController@bulk')->name('merchant.bulk');

    Route::resource('permissions', 'PermissionController');
    Route::post('permissions/update-role-permession', 'PermissionController@updateRolePermission');
    Route::post('permissions/update-role-name', 'PermissionController@updateRoleName');

    Route::post('upload_merchants', 'MerchantsController@uploadMerchants')->name('upload_merchants');

    Route::get('notification-counter', 'AdminModuleController@notificationCounter')->name('admin.notification.list');
});

Route::post('merchant/register', 'MerchantLoginController@doRegister');
Route::post('merchant/login', 'MerchantLoginController@doLogin');
