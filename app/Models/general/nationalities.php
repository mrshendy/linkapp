<?php

namespace App\models\general;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class nationalities extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'default',
        'id_country',
        'status',

    ];

    public $translatable = ['name'];

    protected $table = 'nationalities_settings';

    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function country()
    {
        return $this->belongsTo(countries::class, 'id_country')->nullable();
    }
}
