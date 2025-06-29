<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title_en',
        'title_ar',
        'image',
        'description_en',
        'description_ar',
        'slug',
        'status',
    ];
}
