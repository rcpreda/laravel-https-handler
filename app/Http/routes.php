<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web', 'secure']], function () {
    Route::auth();
});


Route::group(['middleware' => ['web', 'insecure']], function () {
    Route::get('/', ['as' => 'welcome', 'uses' => 'WelcomeController@index']);

});


Route::group(['middleware' => ['web', 'auth', 'secure']], function () {
    Route::get('/dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
});

