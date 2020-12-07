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

Route::get('/login', function () {
    return view('auth.login');
})->name(USER_LOGIN);

Route::prefix('admin')->group(function () {
    Route::get('user', function () {
        return view('admin.user.index');
    })->name(ADMIN_MANAGER_USER);

    Route::get('survey', function () {
        return view('admin.survey.index');
    })->name(ADMIN_MANAGER_SURVEY);
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

Route::get('/population', function () {
    return view('admin.population.index');
})->name(USER_POPULATION);

Route::get('/simulation', function () {
    return view('admin.simulation.simulation');
});

Route::get('/create', function () {
    return view('admin.population.create');
});

Route::get('/statistical', 'HomeController@index')->name(USER_STATISTICAL);

Route::namespace('Auth')->group(function () {

});

Route::namespace('Backend')->group(function () {

});
/*
| Web Routes need to login
*/
