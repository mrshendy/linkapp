<?php

namespace App\models\general;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class SplashScreen extends Model
{
    use SoftDeletes, HasTranslations;

    protected $table = 'splash_screens';

    protected $fillable = [
        'image',
        'title',
        'description',
        'app_type',
        'status',
        'user_add',
    ];

    public $translatable = ['title', 'description'];
}