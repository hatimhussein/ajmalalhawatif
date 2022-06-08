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
    Route::resource('users', 'UserModuleController');
    Route::post('user/bulk', 'UserModuleController@bulk')->name('user.bulk');

    Route::get('deleted-users', 'UserModuleController@deletedUsers')->name("deleted_users");
    Route::get('deleted-customers', 'UserModuleController@deletedCustomers')->name("deleted_customers");
    Route::put('restore-user/{user}', 'UserModuleController@restoreUser')->name("restore_user");

    Route::get('contactus', 'ContactsController@ContactUs');
    Route::get('suggestions_complaint/{type?}', 'ContactsController@SuggestionsComplaint');
    Route::post('suggestions_operation', 'ContactsController@SuggestionsOperations')->name('SuggestionsOperations');
    Route::get('reviews', 'ContactsController@Reviews');
    Route::get('change-review-status/status/{status}/id/{id}', 'ContactsController@changeReviewStatus');
    Route::get('change-user-status/status/{status}/id/{id}', 'UserModuleController@changeUserStatus');
    Route::get('delete-review/id/{id}', 'ContactsController@deleteReview');
    Route::get('delete-suggestion/id/{id}', 'ContactsController@deleteSuggestion');
    Route::get('show-suggestion/id/{id}', 'ContactsController@showSuggestion');
    Route::post('reply-suggestion', 'ContactsController@replySuggestion')->name('admin.replysuggestion');
    Route::delete('contactus/{id}', 'ContactsController@deleteMesssage');
    Route::get('contactus/truncate', 'ContactsController@deleteAllMessages');
    Route::post('upload_users', 'UserModuleController@uploadUsers')->name('upload_users');
    Route::get('users_activity', 'UserModuleController@UserActivity');
    Route::get('merchants_activity', 'UserModuleController@MerchantsActivity');

    Route::get('details/{id}', 'UserModuleController@UserActivityDetails');
    Route::get('wishlist/{id}', 'WishlistController@WishlistByIdAdmin');
});

Route::middleware('guest')->group(function () {
    Route::get('login', 'UserModuleController@showLogin')->name('login');
    Route::post('user/login', 'UserModuleController@doLogin');
    Route::post('user/register', 'UserModuleController@doRegister');

    Route::post('login-by-phone', 'UserModuleController@sendLoginSms');
    Route::post('verify-phone-code', 'UserModuleController@verifyPhoneCode');

    Route::get('social/login/{provider}', 'SocialLoginController@redirectToProvider');
    Route::get('{provider}/callback', 'SocialLoginController@handleProviderCallback');

    Route::get('activation', 'UserModuleController@showActivation');
    Route::post('active-account', 'UserModuleController@activateAccount');
    Route::post('forgot-password', 'UserModuleController@forgotPassword');
    Route::post('forgot-password-phone', 'UserModuleController@forgotPasswordPhone');
    Route::get('reset-password/{token}', 'UserModuleController@resetPassword');
    Route::post('reset-password', 'UserModuleController@doResetPassword');
});


Route::get('logout', 'UserModuleController@logout');


Route::post('subscribe-newsletter', 'AccountController@subscribeNewsletter');


Route::middleware(['auth', 'is_not_ban'])->group(function () {

    Route::get('account-dashboard', 'AccountController@dashboard');
    Route::get('all-suggestion', 'AccountController@allSuggestion')->name('allSuggestion');

    Route::get('account-information', 'AccountController@editInformationData');
    Route::post('update-account-information', 'AccountController@updateInformationData');
    Route::post('update-merchant-information', 'AccountController@updateMerchantInformationData');

    Route::get('change-password', 'AccountController@ChangePassword');
    Route::post('update-change-password', 'AccountController@updatePassword');

    Route::post('reply-user-suggestion', 'UserModuleController@replySuggestion')->name('user.replysuggestion');

    Route::get('account-address', 'AccountController@accountAddress');
    Route::get('userReply/{id}', 'AccountController@userReply');

    Route::post('save-account-address', 'AccountController@saveAccountAddress');

    Route::get('account-address/{id}/edit', 'AccountController@editAccountAddress');
    Route::post('update-account-address', 'AccountController@updateAccountAddress');
    Route::delete('account-address/{id}', 'AccountController@destroyAddress');

    Route::get('wishlist', 'WishlistController@index');

    Route::post('check-Wishlist', 'WishlistController@addOrRemove');

    Route::get('newsletter', 'AccountController@newsletter');

    Route::get('notifications', 'AccountController@notifications')->name('notification.list');
    Route::post('notifications/read', 'AccountController@readNotification')->name('notification.read');

});



