<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutForthSection extends Model
{
    protected $fillable = [

        'batch',

        'title',
        'description',

        'title_meta',
        'desc_meta',

        'web_image1',
        'mobile_image1',

        'web_image2',
        'mobile_image2',

        'image1_alt',
        'image2_alt',


        'card1_title',
        'card1_desc',

        'card2_title',
        'card2_desc',

        'card3_title',
        'card3_desc',

        'card4_title',
        'card4_desc',

        'card5_title',
        'card5_desc',

        'status'
    ];


    protected $casts = [

        'card1_desc'=>'array',
        'card2_desc'=>'array',
        'card3_desc'=>'array',
        'card4_desc'=>'array',
        'card5_desc'=>'array'

    ];

}