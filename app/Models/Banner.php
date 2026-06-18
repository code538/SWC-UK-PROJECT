<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'page_name',

        'title',
        'highlighted_title',
        'title_meta',

        'description',
        'desc_meta',

        'button1_text',
        'button1_url',

        'button2_text',
        'button2_url',

        'image',
        'image_alt',

        'video',
        'video_meta',

        'media_type',
        'status',
    ];
}