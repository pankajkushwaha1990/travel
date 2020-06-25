<?php

use Illuminate\Http\Request;

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

Route::middleware('guest:api')->group(function () {
    Route::post('/user-registration-otp-generate', 'ApiController@user_registration_otp_generate');
    Route::post('/verify_otp', 'ApiController@verify_otp');
    Route::post('/user-registration', 'ApiController@user_registration');
    Route::post('/user-login', 'ApiController@user_login');
    Route::get('/banner-list', 'ApiController@banner_list');
    Route::get('/hot-place-list', 'ApiController@hot_place_list');
    Route::get('/product-list', 'ApiController@product_list');
    Route::post('/verify_coupon', 'ApiController@verify_coupon');
    Route::post('/verify_referer', 'ApiController@verify_referer');
    Route::post('/package_purchase', 'ApiController@package_purchase');
    Route::post('/package_purchase_history', 'ApiController@package_purchase_history');
    Route::post('/package_purchase_cancel', 'ApiController@package_purchase_cancel');
    

    Route::post('/purchase-package', 'ApiController@purchase_package');

});


// Route::middleware('guest:api')->get('/user', 'ApiController@getName');
