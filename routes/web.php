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
Route::get('/', 'HomeController@index')->name(HOME);

Route::get('/login', 'LoginController@index')->name(USER_LOGIN);
Route::post('/login', 'LoginController@login')->name(LOGIN);

Route::middleware('auth.admin')->group(function () {
    Route::prefix('statistical')->group(function () {
        Route::get('user', function () {
            return view('admin.user.index');
        })->name(ADMIN_MANAGER_USER);

        Route::get('survey', function () {
            return view('admin.survey.index');
        })->name(ADMIN_MANAGER_SURVEY);
    });
});

Route::get('/pass-reminder', function () {
    return view('auth.passwords.step1');
})->name(USER_FORGET_PASSWORD_INDEX);

Route::get('/profile', function () {
    return view('profiles.index');
})->name(USER_PROFILE);

Route::get('/pass-reset', function () {
    return view('auth.passwords.reset');
})->name(USER_RESET_PASSWORD_INDEX);

Route::prefix('statistical')->group(function () {
    Route::get('/', 'StatisticController@index')->name(USER_STATISTICAL);
    Route::get('/population', 'StatisticController@showPopulation')->name(USER_STATISTICAL_POPULATION);
    Route::get('/create', 'StatisticController@create')->name(USER_STATISTICAL_CREATE);
    Route::post('/create', 'StatisticController@store')->name(USER_STATISTICAL_STORE);
});
