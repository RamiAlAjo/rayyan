<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'products_categories';

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
        return $this->hasMany(ProductSubcategory::class, 'category_id');
    }

    // ✅ Add this:
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id')->whereNull('subcategory_id');
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
