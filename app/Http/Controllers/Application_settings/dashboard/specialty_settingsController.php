<?php

namespace App\Http\Controllers\Application_settings\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class specialty_settingsController extends Controller
{
    // عرض صفحة التخصصات
    public function index()
    {
        return view('settings.specialties.manage');
    }
}
