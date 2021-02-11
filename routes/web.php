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
 
  

// Route::get('/home', 'HomeController@index')->name('home');

 Route::get('reset_password/{uid}/{token}/{email}',[
   'uses' => 'ForgotPasswordController@reset_password',
   'as' => 'reset_password'
]);
Route::post('submit.reset_password',[
   'uses' => 'ForgotPasswordController@submit_reset_password',
   'as' => 'submit.reset_password'
]);
Route::post('forgot-password/',[
       'uses' => 'ForgotPasswordController@send_link',
       'as' => 'forgot-password/'
  ]);
Route::get('forgot_password',[
       'uses' => 'AuthForgotPasswordController@forgot_password',
       'as' => 'forgot_password'
  ]);
  Route::post('post',[
       'uses' => 'Auth\LoginController@register_post',
       'as' => 'register.post'
  ]);
  Route::get('login',[
       'uses' => 'Auth\LoginController@login',
       'as' => 'login'
  ]);
Route::post('login.post',[
       'uses' => 'Auth\LoginController@post_login',
       'as' => 'login.post'
  ]);
  Route::get('register',[
       'uses' => 'HomeController@register',
       'as' => 'register'
  ]);
  Route::get('/logout',[
   'uses' => 'Auth\LoginController@logout',
   'as' => 'logout'
]);
// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
// Route::get('/', 'Auth\LoginController@login')->name('login');
Route::get('/',[
'uses' => 'Auth\AdminController@dashboard',
'as' => 'admin.dashboard'
]);
Route::group(['prefix'=>'/admin'],function(){

Route::get('dashboard',[
'uses' => 'Auth\AdminController@dashboard',
'as' => 'admin.dashboard',
// 'middleware'=>'can:superadmin'
]);

     Route::get('skills',[
          'uses' => 'Skills\SkillsController@index',
          'as' => 'admin.skills',
          // 'middleware'=>'can:superadmin'
          ]);

     Route::post('skills',[
          'uses' => 'Skills\SkillsController@store',
          'as' => 'admin.skillsstore',
          // 'middleware'=>'can:superadmin'
          ]);

     Route::post('skills/update',[
          'uses' => 'Skills\SkillsController@update',
          'as' => 'admin.skillupdate',
          // 'middleware'=>'can:superadmin'

          ]);
     
     Route::post('skills/delete',[
          'uses' => 'Skills\SkillsController@delete',
          'as' => 'admin.skilldelete',
          // 'middleware'=>'can:superadmin'

          ]);

     Route::get('company',[
          'uses' => 'Company\CompanyController@index',
          'as' => 'admin.company',
          // 'middleware'=>'can:superadmin'
          
          ]);

     Route::get('addcompany',[
          'uses' => 'Company\CompanyController@addcompany',
          'as' => 'admin.addcompany',
          // 'middleware'=>'can:superadmin'

          ]); 

          Route::get('companyedit/{id}',[
               'uses' => 'Company\CompanyController@edit',
               'as' => 'admin.companyedit',
               // 'middleware'=>'can:superadmin'
               ]);

     Route::post('company',[
          'uses' => 'Company\CompanyController@store',
          'as' => 'admin.companystore',
          // 'middleware'=>'can:superadmin'
          ]);

     Route::post('company/update',[
          'uses' => 'Company\CompanyController@update',
          'as' => 'admin.companyupdate',
          // 'middleware'=>'can:superadmin'

          ]);
     
     Route::post('company/delete',[
          'uses' => 'Company\CompanyController@delete',
          'as' => 'admin.companydelete',
          // 'middleware'=>'can:superadmin'

          ]);

     Route::get('company/show/{id}',[
          'uses' => 'Company\CompanyController@show',
          'as' => 'admin.companyshow'
          ]);
     Route::get('users',[
          'uses' => 'User\UsersController@index',
          'as' => 'admin.usershow'
          ]);
    Route::post('add-users',[
               'uses' => 'User\UsersController@add_user',
               'as' => 'admin.useradd'
               ]);
    Route::post('update-users',[
               'uses' => 'User\UsersController@update_user',
               'as' => 'admin.userupdate'
               ]);
    Route::get('providers',[
          'uses' => 'User\UsersController@providers_show',
          'as' => 'admin.providershow'
          ]);
    Route::get('providers/edit/{id}',[
          'uses' => 'User\UsersController@provider_edit',
          'as' => 'admin.provideredit'
          ]);

});
