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
        'email',
        'fax',
        'logo',
        'address',
        'url',
        'location',
        'contact_email',
        'carrers_email',
        'title',
        'description',
        'key_words',
    ];
}
