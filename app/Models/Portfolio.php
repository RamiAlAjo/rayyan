<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
      // Specify the fields that can be mass-assigned
    protected $fillable = [
        'resume',
    ];
}
