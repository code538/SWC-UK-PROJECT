<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSecondSection extends Model
{
    protected $fillable = [

        'batch',

        'title',
        'title_meta',

        'button1_name',
        'button1_details',

        'button2_name',
        'button2_details',

        'web_image',
        'mobile_image',
        'image_alt',

        'our_journey',

        'button3_name',
        'button3_url',

        'button4_name',
        'button4_url',

        'card1_h',
        'card1_d',

        'card2_h',
        'card2_d',

        'card3_h',
        'card3_d',

        'status'
    ];
}