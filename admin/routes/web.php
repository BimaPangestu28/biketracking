<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/index');
});

Auth::routes();
Route::get('logout', 'QovexController@logout');

Route::get('pages-login', 'QovexController@index');
Route::get('pages-login-2', 'QovexController@index');
Route::get('pages-register', 'QovexController@index');
Route::get('pages-register-2', 'QovexController@index');
Route::get('pages-recoverpw', 'QovexController@index');
Route::get('pages-recoverpw-2', 'QovexController@index');
Route::get('pages-lock-screen', 'QovexController@index');
Route::get('pages-lock-screen-2', 'QovexController@index');
Route::get('pages-404', 'QovexController@index');
Route::get('pages-500', 'QovexController@index');
Route::get('pages-maintenance', 'QovexController@index');
Route::get('pages-comingsoon', 'QovexController@index');
Route::post('login-status', 'QovexController@checkStatus');


// You can also use auth middleware to prevent unauthenticated users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/index', 'DashboardController@index')->name('dashboard');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/blogs', 'BlogController@index')->name('blogs.index');
    Route::get('/users', 'UserController@index')->name('users.index');

    Route::group(['prefix' => 'trips'], function () {
        Route::get('/', 'TripController@index')->name('trips.index');
        Route::get('/{id}/detail', 'TripController@show')->name('trips.detail');

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', 'TripCategoryController@index')->name('trips.categories.index');
            Route::delete('/{id}/delete', 'TripCategoryController@destroy')->name('trips.categories.delete');
            Route::get('/create', 'TripCategoryController@create')->name('trips.categories.create');
            Route::post('/store', 'TripCategoryController@store')->name('trips.categories.store');
        });
    });

    Route::group(['prefix' => '/merchants'], function () {
        Route::get('/', 'MerchantController@index')->name('merchants.index');
        Route::get('/create', 'MerchantController@create')->name('merchants.create');
        Route::post('/store', 'MerchantController@store')->name('merchants.store');
        Route::delete('/{id}/delete', 'MerchantController@destroy')->name('merchants.delete');
    });

    Route::group(['prefix' => 'vouchers'], function () {
        Route::get('/', 'VoucherController@index')->name('vouchers.index');
        Route::get('/create', 'VoucherController@create')->name('vouchers.create');
        Route::post('/store', 'VoucherController@store')->name('vouchers.store');
        Route::delete('/{id}/delete', 'VoucherController@destroy')->name('vouchers.delete');
    });

    Route::get('{any}', 'QovexController@index');
});
