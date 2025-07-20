<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotosGallery extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'photos_gallery';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'image_title_en', // English title of the image
        'image_title_ar', // Arabic title of the image
        'status',
        'images', // Path of the image file
    ];

    // Set timestamps to true if you want to automatically manage created_at and updated_at
    public $timestamps = true;
}
