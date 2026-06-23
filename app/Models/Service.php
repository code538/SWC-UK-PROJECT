<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [

        'title',

        'description',

        'title_meta',

        'desc_meta',

        'web_bg_image',

        'mobile_bg_image',

        'image_alt',

        'button1_name',
        'button1_url',

        'button2_name',
        'button2_url',

        'status'

    ];

}