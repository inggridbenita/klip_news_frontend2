<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

// Route::get('/test', 'api\\mail\\ResetPasswordController@index');

Route::prefix('/api')->group(function() {
    Route::prefix('/user')->group(function() {
        Route::get('/check_exist_by_email', 'api\\UserController@checkExistByEmail');
        Route::post('/reset_password', 'api\\UserController@resetPassword');
    });
    Route::prefix('/mail')->group(function() {
        Route::post('/reset_password_mail', 'api\\mail\\ResetPasswordController@index');
    });
});

Route::middleware('IsNotLogin')->group(function() {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::get('/signup', 'SignUpController@index')->name('signup');
    Route::get('/forgot_password/change_password', 'ForgotPasswordController@reset_password');
    Route::get('/forgot_password', 'ForgotPasswordController@begin_reset_password');

    Route::prefix('/api')->group(function() {
        Route::prefix('/signup')->group(function() {
            Route::post('/', 'SignUpController@storeUser');
        });
        Route::prefix('/login')->group(function() {
            Route::post('/', 'LoginController@check_login');
        });
    });
});

Route::middleware('IsLogin')->group(function() {
    Route::get('/home', 'user\\HomeController@index')->name('home');
    Route::get('/baca', 'user\\ReadController@index')
        ->middleware('AddNewsToHistories')
        ->name('baca');
    Route::get('/history', 'user\\HistoryController@index');
    Route::get('/profile', 'user\\ProfileController@index');
    
    Route::prefix('/api')->group(function() {
        Route::post('/logout', 'LogoutController@logout');
        Route::get('/history', 'api\\HistoryController@getUserHistories');
    });
});
