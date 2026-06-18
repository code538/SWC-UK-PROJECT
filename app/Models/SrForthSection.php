<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SrForthSection extends Model
{
    protected $fillable = [
        'title',
        'title_meta',

        'description',
        'desc_meta',

        'web_image',
        'mobile_image',
        'image_alt',

        'title2',
        'desc2',

        'status',
    ];
}