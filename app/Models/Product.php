<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name (optional if it's the plural of the model name)
    protected $table = 'products';

    // Define the fillable attributes
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

    // Optionally define the cast types for certain attributes
    protected $casts = [
        'status' => 'string',
        'category_id' => 'integer',
        'subcategory_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships (if you have category and subcategory models)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productSubcategory()
    {
        return $this->belongsTo(ProductSubcategory::class);
    }

    // For slug generation, you can use a package like `cviebrock/eloquent-sluggable`
    // or create a method to handle it manually.
}
