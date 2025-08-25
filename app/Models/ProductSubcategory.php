<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    use HasFactory;

    // Define the table name (optional if it's the plural of the model name)
    protected $table = 'products_subcategories';

    // Define the fillable attributes
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

    // Optionally, you can define the cast types for certain attributes
    protected $casts = [
        'status' => 'string',
        'category_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the relationship to the Category model
  public function category()
{
    return $this->belongsTo(Category::class);
}


    // Define the relationship to the Product model
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }

    // Optional: Add logic to generate the slug
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
