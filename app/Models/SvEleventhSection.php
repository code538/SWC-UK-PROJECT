<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvEleventhSection extends Model
{

    protected $fillable = [

        'batch',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'cards',

        'status'

    ];


    protected $casts = [

        'cards' => 'array'

    ];

}