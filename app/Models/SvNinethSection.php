<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvNinethSection extends Model
{

    protected $fillable = [

        'batch',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'plans',

        'title2',
        'short_desc',

        'button_name',
        'button_url',

        'status'

    ];


    protected $casts=[

        'plans'=>'array'

    ];


}
