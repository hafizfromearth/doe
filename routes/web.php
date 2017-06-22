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
//admin
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  // Route::post('/register', 'AdminAuth\RegisterController@register');
  //
  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
//toko
Route::group(['prefix' => 'toko'], function () {
  Route::get('/login', 'TokoAuth\LoginController@showLoginForm');
  Route::post('/login', 'TokoAuth\LoginController@login');
  Route::post('/logout', 'TokoAuth\LoginController@logout');

  // Route::get('/register', 'TokoAuth\RegisterController@showRegistrationForm');
  // Route::post('/register', 'TokoAuth\RegisterController@register');

  Route::post('/password/email', 'TokoAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'TokoAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'TokoAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'TokoAuth\ResetPasswordController@showResetForm');
});
//customer
Route::group(['prefix' => 'customer'], function () {
  Route::get('/login', 'CustomerAuth\LoginController@showLoginForm');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout');

  Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'CustomerAuth\RegisterController@register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});
