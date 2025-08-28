<?php

namespace App\models\general;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class countries extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'notes',
        'user_add',

    ];

    public $translatable = ['name'];

    protected $table = 'countries';

    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function governments()
    {
        return $this->hasMany(government::class, 'id_country');
    }

    public function cities()
    {
        return $this->hasMany(city::class, 'id_country');
    }

    public function areas()
    {
        return $this->hasMany(area::class, 'id_country');
    }
}
