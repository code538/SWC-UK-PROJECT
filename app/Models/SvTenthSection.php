<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvTenthSection extends Model
{

    protected $fillable = [

        'batch',
        'identifier',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'title2',
        'short_desc',

        'challenge_title',
        'challenge_desc',

        'strategy_title',
        'strategy_desc',

        'services',
        'results',

        'testimonial_title',
        'testimonial_desc',

        'button_name',
        'button_url',

        'status'

    ];


    protected $casts = [

        'services'=>'array',

        'results'=>'array'

    ];


}