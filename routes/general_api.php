<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes(['verify' => true]);
    //routes get Countries and Government and City and Area 
    Route::group(['middleware' => ['api', 'checkpassword', 'changeLanguage'], 'namespace' => 'Application_settings\api'], function () {
    
        Route::post('get_splashscreen', 'splashscreencontroller@splashscreen');
    });