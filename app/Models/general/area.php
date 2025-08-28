<?php

namespace App\models\general;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class area extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'id_country',
        'id_government',
        'id_city',
        'notes',
        'user_add',

    ];

    public $translatable = ['name'];

    protected $table = 'area';

    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function country()
    {
        return $this->belongsTo(countries::class, 'id_country');
    }

    public function government()
    {
        return $this->belongsTo(government::class, 'id_government');
    }

    public function city()
    {
        return $this->belongsTo(city::class, 'id_city');
    }
}
