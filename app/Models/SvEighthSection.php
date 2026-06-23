<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvEighthSection extends Model
{

    protected $fillable = [

        'batch',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'timelines',

        'title2',
        'short_desc',

        'button_name',
        'button_url',

        'status'

    ];


    protected $casts = [

        'timelines'=>'array'

    ];


}