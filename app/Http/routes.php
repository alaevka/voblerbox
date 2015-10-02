<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home', 'uses' => 'SiteController@getIndexPage'
]);

Route::get('/login', [
    'as' => 'login', 'uses' => 'Auth\AuthController@getLogin'
]);
Route::post('/login', [
    'as' => 'login', 'uses' => 'Auth\AuthController@postLogin'
]);
Route::get('/registration', [
    'as' => 'registration', 'uses' => 'Auth\AuthController@getRegistration'
]);
Route::post('/registration', [
    'as' => 'registration', 'uses' => 'Auth\AuthController@postRegistration'
]);
Route::get('/steamlogin', [
    'as' => 'steamlogin', 'uses' => 'SteamController@getLogin'
]);

Route::get('/logout', [
    'as' => 'logout', 'uses' => 'SteamController@getLogout'
]);

Route::get('/trade', [
    'as' => 'trade', 'uses' => 'SteamController@steamTrade'
]);