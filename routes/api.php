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
Route::post('userSignup', 'API\AuthController@user_signup');
Route::post('provideSignup', 'API\AuthController@provider_signup');
Route::post('userLogin', 'API\AuthController@login');
Route::post('socialLogin', 'API\AuthController@social_login');
Route::post('updateImage', 'API\AuthController@update_image');
Route::post('updateName', 'API\AuthController@change_name');
Route::post('sendEmailOtp', 'API\AuthController@send_otp');
Route::post('verifiyEmailOtp', 'API\AuthController@verify_otp');
Route::post('forgetPassword', 'API\AuthController@forget_password');
Route::post('getcompanies', 'Company\api\ApiController@get_companies');
Route::post('getSkills', 'Skills\api\ApiController@get_skills');
Route::post('getSkillsCategory', 'Skills\api\ApiController@get_skills_cat');
Route::post('getCategories', 'Skills\api\ApiController@get_cat');
Route::post('getProviders', 'Provider\api\ProviderApiController@get_providers');
Route::post('getProviderReviews', 'Provider\api\ProviderApiController@get_provider_rewiews');
Route::post('updateProfile', 'API\AuthController@update_profile');

