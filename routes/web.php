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

Route::get('/demo-chart', 'HomeController@index');
Route::get('/users/profile', function () {
    return view('profiles.index');
})->name(USER_TOP);

Route::get('/pass-reminder', function () {
    return view('forgot_password.step2');
});

Route::namespace('Auth')->group(function () {

});

Route::namespace('Backend')->group(function () {

});
/*
| Web Routes need to login
*/