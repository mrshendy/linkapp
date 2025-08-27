<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth routes
Auth::routes();
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});
// External route files
require base_path('routes/delegate.php');
require base_path('routes/doctor.php');
require base_path('routes/patient.php');
require base_path('routes/pharma_company.php');
require base_path('routes/general.php');

// Catch-all route for admin pages (improve with regex or explicit names if needed)

Route::get('/{page}', 'AdminController@index');