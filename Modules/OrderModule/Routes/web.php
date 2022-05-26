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
    Route::get('orders/merchant/price_level/{status}/{level}', 'OrderAdminController@getOrderByPriceLevel');
    Route::post('orders/merchant/report/search/{id}', 'OrderAdminController@getMerchantreportSearch');
    Route::get('orders/merchants/{status}', 'OrderAdminController@merchantsOrders');
    Route::get('orders/{status}', 'OrderAdminController@index');
    Route::get('order/{order_id}', 'OrderAdminController@show');
    Route::post('order/update-status', 'OrderAdminController@updateStatus');
    Route::get('order/{order_id}/print', 'OrderAdminController@print');
    Route::get('order/invoice/{order_id}', 'OrderAdminController@Invoice');
    Route::get('orders/current/{id}', 'OrderAdminController@getOrders');
    Route::get('orders/merchant/current/{id}', 'OrderAdminController@getMerchantOrders');
    Route::get('orders/merchant/report/{id}', 'OrderAdminController@getMerchantreportOrders');
    Route::get('orders/report/{id}', 'OrderAdminController@getreportOrders');
    Route::post('orders/report/search/{id}', 'OrderAdminController@getreportSearch');
    Route::post('assignOrderAdmins/{order_id}', 'OrderAdminController@assignOrderToUsers');

    Route::get('order/{order_id}/edit', 'OrderAdminController@edit');
    Route::get('order/{orderId}/deleteProduct/{id}', 'OrderAdminController@deleteProduct');
    Route::get('order/{orderId}/updateQuantity/{id}', 'OrderAdminController@updateQuantity');
    Route::post('order/{orderId}/update', 'OrderAdminController@updateOrder');

    Route::delete('order/{id}', 'OrderAdminController@destroy');
    Route::post('order/bulk', 'OrderAdminController@bulk')->name('order.bulk');

    Route::get('orders/create/{type}', 'OrderAdminController@CreateUserOrder');
    Route::get('orders/create/merchant_order', 'OrderAdminController@CreateMerchantOrder');
    Route::get('getUserInfo/{id}', 'OrderAdminController@getUserInfo');
    Route::get('getCategoryProducts/{id}', 'OrderAdminController@getCategoryProducts');
    Route::get('getProductInfo/{id}', 'OrderAdminController@getProductInfo');
    Route::post('previewOrder', 'OrderAdminController@previewOrder');
    Route::post('doCheckout', 'OrderAdminController@doCheckout');

    Route::resource('abandoned-cart', 'AbandonedCartController')->only(['index', 'edit', 'update']);
    Route::resource('cart', 'CartAdminController')->names('admin.cart')->except(['index', 'show', 'create', 'edit']);

    Route::resource('status', 'StatusController');

    Route::get('deleted-orders', 'OrderAdminController@deletedOrders')->name("deleted_orders");
    Route::put('restore-orders/{order}', 'OrderAdminController@restoreOrders')->name("restore_orders");
});

Route::middleware('is_not_ban')->group(function () {

    Route::get('cart', 'CartController@index');
    Route::post('add-to-cart', 'CartController@addToCart');

    Route::post('remove-item-cart', 'CartController@removeItem');
    Route::post('update-quantity', 'CartController@updateQuantity');

    Route::get('clear-cart', 'CartController@clearCart');

    Route::middleware(['auth', 'is_active'])->group(function () {
        Route::get('checkout', 'OrderModuleController@checkout');
        Route::post('do-checkout', 'OrderModuleController@doCheckout');
        Route::post('re-order/{order}', 'CartController@reOrder');
        Route::get('orders', 'OrderModuleController@myOrders');
        Route::get('order/invoice/{order_id}', 'OrderModuleController@Invoice');

        Route::resource('returns', 'ReturnController')->names('front.returns')->only(['index', 'create', 'store']);
    });

    Route::get('shipping-cost', 'OrderModuleController@shippingCost');

    Route::get('order/{id}', 'OrderModuleController@orderDetails');

    Route::post('order/cancel', 'OrderModuleController@cancelOrder');

    Route::get('getShippingWithTax', 'OrderModuleController@getShippingWithTax');

//    payment
    Route::get('payment/callback/{provider}/{transaction_id}', 'OrderModuleController@paymentCallback')->name('payment.callback.success');
});

