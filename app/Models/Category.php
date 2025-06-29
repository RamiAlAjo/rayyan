<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the table name (optional, as Laravel will pluralize the model name)
    protected $table = 'categories';

    // Define the fillable attributes
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image',
        'status',
    ];

    // Optionally define the cast types for certain attributes
    protected $casts = [
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the relationship to products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
