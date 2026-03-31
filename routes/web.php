<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use Modules\CommonModule\Notifications\TestSmsNotification;
use Modules\ConfigModule\Entities\Config;
use Modules\ConfigModule\Repository\ConfigRepository;

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

Route::get('/', function () {
    return view('welcome');
});

// Legacy redirects (SEO-friendly permanent redirects)
Route::get('/warranty-new', function () {
    return redirect('/skudo-warranty/create?type=sms', 301);
});

Route::get('/insurance/create', function () {
    return redirect('/skudo-insurance/create', 301);
});

