<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin Routes
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::group(['middleware' => 'admin'], function () {
    Route::get('/', 'AdminAuth\AdminController@index');
  });


});

//Editor Routes

Route::group(['prefix' => 'editor'], function () {
  Route::get('/login', 'EditorAuth\LoginController@showLoginForm');
  Route::post('/login', 'EditorAuth\LoginController@login');
  Route::post('/logout', 'EditorAuth\LoginController@logout');

  Route::get('/register', 'EditorAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'EditorAuth\RegisterController@register');

  Route::post('/password/email', 'EditorAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'EditorAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'EditorAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'EditorAuth\ResetPasswordController@showResetForm');
});
//Client Routes

Route::group(['prefix' => 'client'], function () {
  Route::get('/login', 'ClientAuth\LoginController@showLoginForm');
  Route::post('/login', 'ClientAuth\LoginController@login');
  Route::post('/logout', 'ClientAuth\LoginController@logout');

  Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'ClientAuth\RegisterController@register');

  Route::post('/password/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'ClientAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'ClientAuth\ResetPasswordController@showResetForm');
});
