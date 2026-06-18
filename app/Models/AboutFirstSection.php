<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutFirstSection extends Model
{
    protected $fillable = [

        'title',
        'highlighted_text',

        'description',

        'title_meta',
        'desc_meta',

        'bg_image',
        'image_alt',

        'button1_name',
        'button1_url',

        'button2_name',
        'button2_url',

        'status'

    ];
}