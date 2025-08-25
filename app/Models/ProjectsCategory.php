<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsCategory extends Model
{
    use HasFactory;

    protected $table = 'projects_categories';

    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image',
        'status',
        'slug',
    ];

    public function subcategories()
    {
        return $this->hasMany(ProjectsSubcategory::class, 'category_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (!$category->slug) {
                $category->slug = \Str::slug($category->name_en);
            }
        });
    }
}
