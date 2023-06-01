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

// Route::group(['namespace'=>'Admin'], function(){
//     Route::get('login','LoginController@login')->name('login');
//     Route::post('postlogin', 'LoginController@postLogin')->name('postLogin');
// });

// Route::group(['namespace'=>'Admin','middleware'=>['auth'],'prefix'=>'admin'],function(){
    // Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('activity', 'App\Http\Controllers\Admin\ActivityController');
    // Route::resource('dashboard','DashboardController');
    // Route::post('logout','LoginController@Logout')->name('logout');
    // Route::resource('user', 'UserController');
    // Route::resource('slider', 'SliderController');
    // Route::resource('news', 'NewsController');
    // Route::resource('services', 'ServiceController');
    // Route::resource('bod', 'BodController');
    // Route::post('menu/reorder/{category_id}','MenuController@reorder');
    // Route::get('menu/manage-order',"MenuController@list")->name('menu.list');
    // Route::resource('menu', 'MenuController');
    // Route::resource('faq', 'FaqController');
    // Route::resource('atm', 'AtmController');
// });

// Route::group(['middleware' => 'web'], function(){
    // Route::get('/admin', 'AdminController@index');
    // Route::group(['namespace' => 'user'], function(){
    //     Route::get('/user', 'UserController@index');
    //     Route::get('/user/add', 'UserController@getAdd');
    //     Route::post('/user/add', 'UserController@postAdd');
    //     Route::get('/user/edit/{id}', 'UserController@getEdit');
    //     Route::post('/user/edit/{id}', 'UserController@postEdit');
    //     Route::get('/user/delete/{id}', 'UserController@delete');
    // });
// });

Route::resource('/users', 'App\Http\Controllers\Admin\UserController');