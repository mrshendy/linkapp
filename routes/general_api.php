<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
// routes get Countries and Government and City and Area
Route::group(['middleware' => ['api', 'checkpassword', 'changeLanguage'], 'namespace' => 'Application_settings\api'], function () {

    Route::post('get_splashscreen', 'splashscreencontroller@splashscreen');

    Route::get('specialty', 'specialty_settingsController@specialty');

    // مجموعة API Routes خاصة بإعدادات التطبيق
    Route::prefix('settings')->group(function () {

        Route::apiResource('application', application_settingsController::class);
        Route::apiResource('areas', areaController::class);
        Route::apiResource('cities', CityController::class);
        Route::apiResource('countries', CountriesController::class);
        Route::apiResource('currencies', currenciesController::class);
        Route::apiResource('governments', GovernmentController::class);
        Route::apiResource('nationalities', nationalities_settingsController::class);
        Route::apiResource('places', place_settingsController::class);

    });

});
