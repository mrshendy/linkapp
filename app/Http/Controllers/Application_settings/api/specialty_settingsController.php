<?php

namespace App\Http\Controllers\Application_settings\api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\general\specialty;
use App\Traits\api\ApiresponseTrait;

class specialty_settingsController extends Controller
{
    use ApiresponseTrait;
    public function specialty()
    {
       
        // جلب اللغة الحالية
        $locale = app()->getLocale();

        // جلب البيانات مع الترجمة الصحيحة
        $specialty = specialty::select('image', "title->$locale as title_specialty",)
            ->where('status', 'active')
            ->get();

        // التحقق هل في بيانات ولا لا
        if ($specialty->isEmpty()) {
            return $this->apiResponse([], 'No specialty found', 404);
        }

        return $this->apiResponse($specialty, 'ok', 200);
    }
}