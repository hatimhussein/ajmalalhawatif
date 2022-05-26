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

    Route::resource('country', 'CountryController');
    Route::post('country/bulk', 'CountryController@bulk')->name('country.bulk');
    Route::get('downloadCountry', 'CountryController@downloaCountry');
    Route::post('uploadCountry', 'CountryController@uploadCountry');

    Route::resource('government', 'GovernmentController');
    Route::post('government/bulk', 'GovernmentController@bulk')->name('government.bulk');
    Route::get('downloadgovernment', 'GovernmentController@downloadGovernment');
    Route::post('uploadgovernment', 'GovernmentController@uploadGovernment');

    Route::resource('city', 'CityController');
    Route::post('city/bulk', 'CityController@bulk')->name('city.bulk');
    Route::get('downloadcity', 'CityController@downloadCity');
    Route::post('uploadcity', 'CityController@uploadCity');

    Route::resource('zone', 'ZoneController');
    Route::post('zone/bulk', 'ZoneController@bulk')->name('zone.bulk');
    Route::get('downloadzone', 'ZoneController@downloadZone');
    Route::post('uploadzone', 'ZoneController@uploadZone');
});


Route::get('getCountryList', 'CountryController@getCountries');
Route::get('getCityList', 'CityController@getCities');
Route::get('getZoneList', 'ZoneController@getZoneList');
Route::get('getGovernmentList', 'GovernmentController@getGovernmentList');



