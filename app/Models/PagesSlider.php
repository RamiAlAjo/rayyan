<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesSlider extends Model
{
    use HasFactory;

    protected $table = 'pages_slider';  // The name of the table

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'url',
    ];

    /**
     * Get the full URL of the image
     */
    public function getImageUrlAttribute()
    {
        // Assuming images are stored in the 'uploads/sliders/image/' directory
        return asset('storage/' . $this->image);
    }
}
