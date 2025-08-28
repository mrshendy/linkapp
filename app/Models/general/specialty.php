<?php
namespace App\models\general;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class specialty extends Model
{
    use SoftDeletes, HasTranslations;

    protected $table = 'specialties';

    protected $fillable = [
        'image',
        'title',
        'status',
        'user_add',
    ];

    public $translatable = ['title'];
}