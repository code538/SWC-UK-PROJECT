<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvFirstSection extends Model
{
    protected $fillable = [

        'batch',
        'identifier',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'button1_name',
        'button1_url',

        'button2_name',
        'button2_url',

        'feature',

        'web_image',
        'mobile_image',
        'image_alt',

        'f_card',
        's_card',
        't_card',

        'status'

    ];


    protected $casts = [

        'feature'=>'array',

        'f_card'=>'array',

        's_card'=>'array',

        't_card'=>'array'

    ];
}