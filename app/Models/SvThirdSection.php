<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvThirdSection extends Model
{
    protected $fillable = [

        'batch',
        'identifier',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'web_image',
        'mobile_image',
        'image_alt',

        'card1_title',
        'card2_title',
        'card3_title',
        'card4_title',

        'title2',
        'short_desc',

        'button_name',
        'button_url',

        'status'

    ];
}