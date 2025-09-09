<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    use HasFactory;
protected $table = 'products_subcategories';
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
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($subcategory) {
            if (!$subcategory->slug) {
                $subcategory->slug = \Str::slug($subcategory->name_en);
            }
        });
    }
}
