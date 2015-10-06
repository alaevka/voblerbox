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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [
        'as' => 'logout', 'uses' => 'SteamController@getLogout'
    ]);
    Route::get('/profile', [
        'as' => 'profile', 'uses' => 'Auth\AuthController@getProfile'
    ]);
    Route::post('/profile/settings', [
        'as' => 'profile/settings', 'uses' => 'Auth\AuthController@postSettings'
    ]);
    Route::get('/trade', [
        'as' => 'trade', 'uses' => 'SteamController@steamTrade'
    ]);

    Route::get('/addbox', [
        'uses' => 'SiteController@addBox'
    ]);

    Route::get('/addbalance/{id}/{value}', [
        'as' => 'addbalance', 'uses' => 'SiteController@addBalance'
    ]);

    Route::get('/addlures/{id}', [
        'as' => 'addrandomlures', 'uses' => 'SiteController@addRandomLures'
    ]);

    Route::get('/box/{id}', [
        'as' => 'box', 'uses' => 'BoxController@getBox'
    ]);

    Route::post('/roulette', [
        'as' => 'roulette', 'uses' => 'BoxController@postRoulette'
    ]);
});

