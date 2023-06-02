<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// only allow logged in users to access those routes
Route::group(['middleware' => ['auth']], function() {

    // only allow admin to access those routes
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    });

    Route::resource('activity', 'App\Http\Controllers\Admin\ActivityController');
});