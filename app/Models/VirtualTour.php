<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualTour extends Model
{
    protected $guarded = [];

    protected $casts = [
        'image_paths' => 'array',
        'is_active' => 'boolean',
    ];
}
