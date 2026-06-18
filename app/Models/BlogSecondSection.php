<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSecondSection extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',

        'web_image',
        'mobile_image',
        'image_alt',

        'long_desc',
        'desc_meta',

        'date',

        'popular',
        'last_read',

        'social_title',
        'social_desc',

        'facebook',
        'linkedin',
        'instagram',
        'twitter',

        'status',
    ];
}