<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes for frontend
Route::get('/', 'App\Http\Controllers\Frontend\HomepageController@index')->name('home');
Route::get('/activities', 'App\Http\Controllers\Frontend\ActivityController@index')->name('activities');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// only allow logged in users to access those routes
Route::group(['middleware' => ['auth']], function() {

    // only allow admin to access those routes
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('users', 'App\Http\Controllers\Admin\UserController');
        Route::post('users/search', 'App\Http\Controllers\Admin\UserController@search')->name('users.search');
        Route::delete('users/delete/{id}', 'App\Http\Controllers\Admin\UserController@delete')->name('users.delete');
    });

    Route::resource('activity', 'App\Http\Controllers\Admin\ActivityController');
    
    Route::delete('activity', 'App\Http\Controllers\Admin\ActivityController@deleteImage')->name('activity.deleteImage');
    Route::post('activity/search', 'App\Http\Controllers\Admin\ActivityController@search')->name('activity.search');
    Route::put('activity/getShiftTiming/{id}', 'App\Http\Controllers\Admin\ActivityController@getShiftTiming')->name('activity.getShiftTiming');
    Route::put('activity', 'App\Http\Controllers\Admin\ActivityController@updateImageOrder')->name('activity.updateImageOrder');
    
    Route::resource('bookings', 'App\Http\Controllers\Admin\BookingController');
    Route::post('booking/search', 'App\Http\Controllers\Admin\BookingController@search')->name('bookings.search');
    Route::get('/bookings/calendar', 'App\Http\Controllers\Admin\BookingController@calendarView')->name('bookings.calendar');
    Route::get('/bookings/exportCSV', 'App\Http\Controllers\Admin\BookingController@exportCSV')->name('bookings.exportCSV');
   

    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('tags', 'App\Http\Controllers\Admin\TagController');

    Route::resource('coupons', 'App\Http\Controllers\Admin\CouponController');

    Route::resource('company', 'App\Http\Controllers\Admin\CompanyController');
    Route::post('company/search', 'App\Http\Controllers\Admin\CompanyController@search')->name('company.search');

    Route::get('settings/profile', 'App\Http\Controllers\Admin\SettingsController@profile')->name('settings.profile');
    Route::put('settings/profile/{id}', 'App\Http\Controllers\Admin\SettingsController@profileUpdate')->name('settings.profileUpdate');
});