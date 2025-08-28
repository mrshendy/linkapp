<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes(['verify' => true]);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'verified'],
    ],
    function () {
         // ✅ Controllers العادية
        Route::group(['namespace' => 'Application_settings\dashboard'], function () {

            Route::resource('places_settings', 'place_settingsController');
            Route::resource('countries', 'CountriesController');

            Route::get('/city/{id}', 'CityController@getGovernment');
            Route::resource('city', 'CityController');

            Route::resource('government', 'GovernmentController');

            Route::get('/area/{id}', 'areaController@getcity');
            Route::resource('area', 'areaController');

            Route::resource('settings_type', 'settings_typeController');

            // 🔹 resource للإعدادات
            Route::resource('settings', 'application_settingsController');

            Route::resource('specialties', 'specialty_settingsController');


            // 🔹 صفحة manage إضافية
            Route::get('/settingssplashscreen', 'application_settingsController@splashscreen')
                ->name('settings.splashscreen');

            Route::resource('currencies', 'currenciesController');
            Route::resource('nationalities_settings', 'nationalities_settingsController');
        });
     
    },
);

Auth::routes();
//Auth::routes(['register' => false]);