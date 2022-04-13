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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/test', 'LoginController@check_login');

Route::middleware('IsNotLogin')->group(function() {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::get('/signup', 'SignUpController@index')->name('signup');
});

Route::get('/home', 'user\\HomeController@index')->name('home');

Route::prefix('/api')->group(function() {
    Route::prefix('/signup')->group(function() {
        Route::post('/', 'SignUpController@storeUser');
    });
    Route::prefix('/login')->group(function() {
        Route::post('/', 'LoginController@check_login');
    });
});
