<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'icon_path',
        'order',
        'status',
    ];
}
