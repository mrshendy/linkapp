<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

require base_path('routes/delegate_api.php');
require base_path('routes/doctor_api.php');
require base_path('routes/patient_api.php');
require base_path('routes/pharma_company_api.php');
require base_path('routes/general_api.php');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});