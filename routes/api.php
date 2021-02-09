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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('emailCheck', 'API\AuthController@check_email');
Route::post('userSignup', 'API\AuthController@signup');
Route::post('provideSignup', 'API\AuthController@provider_signup');
Route::post('userLogin', 'API\AuthController@login');
Route::post('socialLogin', 'API\AuthController@social_login');
Route::post('updateImage', 'API\AuthController@update_image');
Route::post('updateName', 'API\AuthController@change_name');
Route::post('sendEmailOtp', 'API\AuthController@send_otp');
Route::post('verifiyEmailOtp', 'API\AuthController@verify_otp');
Route::post('forgetPassword', 'API\AuthController@forget_password');
Route::post('getcompanies', 'Company\api\ApiController@get_companies');


