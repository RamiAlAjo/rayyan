<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $table = "website_settings";

    protected $fillable = [
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'phone',
        'phone2',    // Add phone2
        'phone3',    // Add phone3
        'email',
        'fax',
        'logo',
        'address',
        'url',
        'location',
    ];
}
