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
    return view('auth.login');
})->name(USER_LOGIN);

Route::get('/pass-reminder', function () {
    return view('auth.passwords.step1');
})->name(USER_FORGET_PASSWORD_INDEX);

Route::get('/profile', function () {
    return view('profiles.index');
})->name(USER_PROFILE);

Route::get('/pass-reset', function () {
    return view('auth.passwords.reset');
})->name(USER_RESET_PASSWORD_INDEX);

Route::get('/population', function () {
    return view('admin.population.index');
})->name(USER_POPULATION);

Route::get('/statistical', 'HomeController@index')->name(USER_STATISTICAL);

Route::namespace('Auth')->group(function () {

});

Route::namespace('Backend')->group(function () {

});
/*
| Web Routes need to login
*/