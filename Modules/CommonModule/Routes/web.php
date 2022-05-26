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

Route::prefix('commonmodule')->group(function () {
    Route::get('/', 'CommonModuleController@index');
});

//Route::get('command/{command}', function ($command) {
//    /* php artisan migrate */
//    \Artisan::call($command);
//    dd("Done");
//});

//Route::get('/notification', function () {
//    $user = \Modules\UserModule\Entities\User::where('email', 'et.azm112@gmail.com')->first();
//    $cart = $user->cart()->first();
//    $order = $user->orders()->first();

//    return (new \Modules\UserModule\Notifications\UserRegisterNotification())->toMail($user);
//    return (new \Modules\OrderModule\Notifications\OrderCreatedNotification($order))->toMail($user);
//    return (new \Modules\OrderModule\Notifications\CartOfferNotification($cart))->toMail($user);
//    $admin = \Modules\AdminModule\Entities\Admin::first();
//    return (new \Modules\OrderModule\Notifications\OrderStatusEmployeeNotification($order))->toMail($admin);
//});
