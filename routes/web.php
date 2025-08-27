<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes(['verify' => true]);

// 🔹 لو المستخدم ضيف (مش عامل تسجيل دخول)
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

// 🔹 باقي المسارات تحت اللغة + التحقق
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath',
            'auth',
            'verified'
        ],
    ],
    function () {

        // ✅ Controllers العادية
        Route::group(['namespace' => 'Application_settings'], function () {

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

            // 🔹 صفحة manage إضافية
            Route::get('/settingsmanage', 'application_settingsController@manage')
                ->name('settings.manage');

            Route::resource('currencies', 'currenciesController');
            Route::resource('nationalities_settings', 'nationalities_settingsController');
        });

        // ✅ لوحة التحكم
        Route::group(['namespace' => 'dashbord'], function () {
            Route::resource('dashbord', 'dashbordController');
        });

        // ✅ أي صفحة عامة
        Route::get('/{page}', 'AdminController@index');
    }
);

Auth::routes();
