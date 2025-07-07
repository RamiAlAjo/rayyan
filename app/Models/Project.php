<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
        'subcategory_id',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectsCategory::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(ProjectsSubcategory::class, 'subcategory_id');
    }
}
