<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvForthSection extends Model
{
    protected $fillable = [

        'batch',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'features',

        'title2',
        'short_desc',

        'status'

    ];


    protected $casts = [

        'features' => 'array'

    ];
}