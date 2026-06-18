<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutThirdSection extends Model
{
    protected $fillable = [

        'batch',

        'title',
        'highlighted_title',
        'description',

        'meta_title',
        'meta_desc',

        'button1_name',
        'button1_url',

        'button2_name',
        'button2_url',

        'youtube_url',

        'web_image',
        'mobile_image',
        'image_alt',

        'card1_tit',
        'card1_det',

        'card2_tit',
        'card2_det',

        'card3_tit',
        'card3_det',

        'status'
    ];
}