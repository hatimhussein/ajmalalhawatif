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

Route::prefix('fronthomemodule')->group(function () {
    Route::get('/', 'FrontHomeModuleController@index');
});

Route::middleware(['is_not_ban','auth'])->group(function () {
    Route::get('/suggestions', "HomeController@suggestions");
    Route::post('store-file-suggestions', 'HomeController@suggestionsStore');
});


Route::middleware('is_not_ban')->group(function () {

    Route::get('/', "HomeController@index");

    Route::get('/contact_us', "HomeController@contactUs");

    Route::post('/save-suggestion-complaint', "HomeController@saveSuggestionComplaintForm");
    Route::post('/save-contact-us', "HomeController@saveContactus");

    Route::get('/brands', 'HomeController@brands');
});
