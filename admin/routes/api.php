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

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('details', 'Api\AuthenticationController@details');
});

// Authentication route api
Route::post('login', 'Api\AuthenticationController@login');
Route::post('register', 'Api\AuthenticationController@register');


// Trip
Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => '/trips'], function () {
        Route::post('/start', 'Api\TripApiController@start');
        Route::post('/{id}/upload', 'Api\TripApiController@upload');
        Route::post('/{id}/save-coordinate', 'Api\TripApiController@saveCoordinate');
        Route::post('/{id}/save-speed', 'Api\TripApiController@saveSpeed');

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', 'Api\TripApiController@getCategories');
        });
    });
});
