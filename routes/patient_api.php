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

      
    }
);

Auth::routes();