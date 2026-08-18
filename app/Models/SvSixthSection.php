<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvSixthSection extends Model
{
    protected $fillable = [

        'batch',
        'identifier',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'services',

        'title2',
        'short_desc',

        'button_name',
        'button_url',

        'status'

    ];


    protected $casts=[

        'services'=>'array'

    ];

}