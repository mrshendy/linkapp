<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class setting extends Model
{
    use HasFactory, SoftDeletes;

     protected $fillable = [
        'title_ar',
        'title_en',
        'app_name',
        'description_ar',
        'description_en',
        'status',
    ];
}
