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

//Route::get('auth/facebook', 'Auth\SocialAuthController@facebookLogin')->name('socialAuth');
//Route::post('login/facebook', 'Auth\SocialAuthController@facebookLogin');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('socialAuth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

