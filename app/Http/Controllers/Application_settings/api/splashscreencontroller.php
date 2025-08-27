<?php

namespace App\Http\Controllers\Application_settings\api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\general\splashscreen;
use App\Traits\api\ApiresponseTrait;

class splashscreencontroller extends Controller
{
    use ApiresponseTrait;
    public function splashscreen(Request $request)
    {
        // التحقق من أن الـ app_type موجود
        $request->validate([
            'app_type' => 'required|string|in:delegate,patient,doctor,pharma_company',
        ]);

        // جلب اللغة الحالية
        $locale = app()->getLocale();

        // جلب البيانات مع الترجمة الصحيحة
        $splashscreens = Splashscreen::select('image', "title->$locale as title_screen", "description->$locale as description_screen")
            ->where('status', 'active')
            ->where('app_type', $request->app_type)
            ->get();

        // التحقق هل في بيانات ولا لا
        if ($splashscreens->isEmpty()) {
            return $this->apiResponse([], 'No splash screens found', 404);
        }

        return $this->apiResponse($splashscreens, 'ok', 200);
    }
}