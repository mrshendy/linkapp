<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Auth::routes(['verify'=>true]);
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
Route::group(['middleware'=>['guest']],function(){
    Route::get('/', function()
     {
         return view('auth.login');
       
         
     });
 
 });
 
 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth','verified' ]
    ], function(){
     
        Route::group(['namespace'=>'Application_settings'],function()
        {
            //Place settings
             Route::resource('places_settings', 'place_settingsController');
            //countries
            Route::resource('countries', 'CountriesController');
            //city
            Route::get('/city/{id}', 'CityController@getGovernment');
            Route::resource('city', 'CityController');
            //government
            Route::resource('government', 'GovernmentController');
            //area
            Route::get('/area/{id}', 'areaController@getcity');
            Route::resource('area', 'areaController');
            //settings_type settings
            Route::resource('settings_type','settings_typeController');
            // application_setting
            Route::resource('settings','application_settingsController');
            //currencies settings
            Route::resource('currencies', 'currenciesController');
             //nationalities settings
            Route::resource('nationalities_settings', 'nationalities_settingsController');
        });
      
        Route::group(['namespace'=>'dashbord'],function()
        {
            Route::resource('dashbord', 'dashbordController');
        });
            Route::get('/{page}', 'AdminController@index');
         

         });
       

   
Auth::routes();
//Auth::routes(['register' => false]);
