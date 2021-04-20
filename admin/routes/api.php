<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication route api
Route::post('login', 'Api\AuthenticationController@login');
Route::post('register', 'Api\AuthenticationController@register');


// Trip
Route::get('/dashboard', 'DashboardController@api');

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => '/trips'], function () {
        Route::get('/', 'Api\TripApiController@list');
        Route::get('/top-leaders/{type}', 'Api\TripApiController@topLeaders');
        Route::post('/start', 'Api\TripApiController@start');
        Route::post('/{id}/finish', 'Api\TripApiController@finish');
        Route::post('/{id}/upload', 'Api\TripApiController@upload');
        Route::post('/{id}/save-coordinate', 'Api\TripApiController@saveCoordinate');
        Route::post('/{id}/save-speed', 'Api\TripApiController@saveSpeed');

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', 'Api\TripApiController@getCategories');
        });
    });

    Route::group(['prefix' => '/user'], function () {
        Route::put('/update', 'Api\UserApiController@update');
        Route::get('/detail', 'Api\UserApiController@detail');
        Route::get('/trips', 'Api\UserApiController@getTrips');
    });

    Route::group(['prefix' => '/vouchers'], function () {
        Route::get('/', 'Api\VoucherApiController@lists');
        Route::get('/{id}', 'Api\VoucherApiController@detail');
        Route::put('/{id}/take_voucher', 'Api\VoucherApiController@take_voucher');
        Route::put('/{id}/use_voucher', 'Api\VoucherApiController@use_voucher');
    });
});
