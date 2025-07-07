<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image',
        'status',
        'category_id',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectsCategory::class, 'category_id');
    }
}
