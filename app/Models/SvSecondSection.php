<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvSecondSection extends Model
{
    protected $fillable = [

        'batch',
        'identifier',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'feature',

        'tag_line',

        'status'

    ];


    protected $casts = [

        'feature'=>'array'

    ];
}