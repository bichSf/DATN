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
Route::post('/logout', 'LoginController@logout')->name(LOGOUT);
Route::get('/pass-reminder', function () {
    return view('auth.passwords.step1');
})->name(USER_FORGET_PASSWORD_INDEX);

Route::middleware('auth.admin')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name(ADMIN_MANAGER_USER);
            Route::get('/create', 'UserController@create')->name(ADMIN_USER_CREATE);
            Route::post('/store', 'UserController@store')->name(ADMIN_USER_STORE);
            Route::get('/edit/{id}', 'UserController@edit')->name(ADMIN_USER_EDIT);
            Route::post('/update/{id}', 'UserController@update')->name(ADMIN_USER_UPDATE);
            Route::delete('/delete/{id}', 'UserController@destroy')->name(ADMIN_USER_DESTROY);
        });

        Route::prefix('survey')->group(function () {
            Route::get('/', 'SurveyController@index')->name(ADMIN_MANAGER_SURVEY);
            Route::get('/create', 'SurveyController@create')->name(ADMIN_SURVEY_CREATE);
            Route::post('/store', 'SurveyController@store')->name(ADMIN_SURVEY_STORE);
            Route::get('/edit/{id}', 'SurveyController@edit')->name(ADMIN_SURVEY_EDIT);
            Route::post('/update/{id}', 'SurveyController@update')->name(ADMIN_SURVEY_UPDATE);
            Route::delete('/delete/{id}', 'SurveyController@destroy')->name(ADMIN_SURVEY_DESTROY);
        });
    });

    Route::middleware('role:user')->group(function () {
        Route::prefix('nutrition')->group(function () {
            Route::get('/', 'NutritionController@showPopulation')->name(USER_NUTRITION_INDEX);
            Route::post('/get-survey', 'NutritionController@getSurvey');
            Route::get('/create', 'NutritionController@create')->name(USER_NUTRITION_CREATE);
            Route::post('/store', 'NutritionController@store')->name(USER_NUTRITION_STORE);
            Route::delete('/delete/{id}', 'NutritionController@destroy')->name(USER_NUTRITION_DESTROY);
            Route::post('/delete-multi', 'NutritionController@destroyMulti')->name(USER_NUTRITION_DESTROY_MULTI);
        });

        Route::prefix('statistical')->group(function () {
            Route::get('/', 'NutritionController@index')->name(USER_STATISTICAL);
            Route::post('/get-zscore', 'NutritionController@getZscore');
            Route::get('/get-zscore', 'NutritionController@getZscore');
            Route::post('/get-column-chart', 'NutritionController@getColumnChart');
            Route::get('/get-avg-weight-height', 'NutritionController@getAvgWeightHeight');
            Route::post('/get-data-bmi', 'NutritionController@getDataBmi');
        });

        Route::prefix('change-password')->group(function () {
            Route::get('/', 'ChangePasswordController@index')->name(USER_RESET_PASSWORD_INDEX);
            Route::post('/update', 'ChangePasswordController@update')->name(USER_RESET_PASSWORD);
        });

        Route::prefix('profile')->group(function () {
            Route::get('/', 'ProfileController@index')->name(USER_PROFILE);
            Route::post('/update', 'ProfileController@update')->name(USER_RESET_PASSWORD);
        });
    });
});
