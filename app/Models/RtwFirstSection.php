<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RtwFirstSection extends Model
{
    protected $fillable = [

        'batch',

        'title',

        'description',

        'title_meta',

        'desc_meta',

        'features',

        'button_name',

        'button_url',

        'status'

    ];

    protected $casts = [

        'features' => 'array'

    ];
}