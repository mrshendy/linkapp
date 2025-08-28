<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Controllers
use App\Http\Controllers\Application_settings\place_settingsController;
use App\Http\Controllers\Application_settings\CountriesController;
use App\Http\Controllers\Application_settings\CityController;
use App\Http\Controllers\Application_settings\GovernmentController;
use App\Http\Controllers\Application_settings\application_settingsController;
use App\Http\Controllers\Application_settings\currenciesController;
use App\Http\Controllers\Application_settings\nationalities_settingsController;
use App\Http\Controllers\Application_settings\areaController;

Auth::routes(['verify' => true]);

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

        // ✅ Resources
        Route::resource('countries', CountriesController::class);
        Route::resource('city', CityController::class);
        Route::resource('area', areaController::class);
        Route::resource('government', GovernmentController::class);
        Route::resource('settings_type', application_settingsController::class);
        Route::resource('settings', application_settingsController::class);
        Route::resource('specialties', application_settingsController::class);
        Route::resource('nationalities_settings', nationalities_settingsController::class);

        // ✅ روابط إضافية
        // Route::get('/city/{id}', [CityController::class, 'getGovernment']);
        // Route::get('/area/{id}', [areaController::class, 'getcity']);

        Route::get('/settingssplashscreen', [application_settingsController::class, 'splashscreen'])
            ->name('settings.splashscreen');

        // ✅ صفحة إعدادات الأماكن (Dashboard)
        Route::get('places_settings', [place_settingsController::class, 'index'])
            ->name('places.settings');
    }
);

Auth::routes();
// Auth::routes(['register' => false]);
