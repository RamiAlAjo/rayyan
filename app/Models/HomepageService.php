<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageService extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name follows the convention)
    protected $table = 'homepage_services';

    // Define which attributes are mass assignable
    protected $fillable = [
        'title_en',
        'title_ar',
        'icon_path',
        'order',
        'status'
    ];

    // Optionally, define any castings (e.g., for dates, booleans, etc.)
    protected $casts = [
        'order' => 'integer',
        'status' => 'string',
    ];

    // If needed, you can define relationships here, like category or subcategory
}
