<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvFifthSection extends Model
{
    protected $fillable = [

        'batch',
        'identifier',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'features',

        'statistics',

        'title2',
        'short_desc',

        'status'

    ];


    protected $casts = [

        'features'=>'array',

        'statistics'=>'array'

    ];

}