<?php

namespace App\Http\Controllers\Application_settings;

use App\Http\Controllers\Controller;
use App\models\general\city;
use App\models\general\countries;
use App\models\general\Government;
use App\models\general\area;

class place_settingsController extends Controller
{
    public function index()
    {
        return view('settings.places_settings'); // ✅ ده يفتح resources/views/settings/places.blade.php
    }
}
