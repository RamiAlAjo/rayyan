<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'portfolio_name_en',
        'portfolio_name_ar',
        'resume_path',
    ];
}
