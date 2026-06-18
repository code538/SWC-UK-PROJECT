<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamFirstSection extends Model
{
    protected $fillable = [
        'title',
        'highlighted_title',
        'title_meta',

        'description',
        'desc_meta',

        'button1_name',
        'button1_url',

        'button2_name',
        'button2_url',

        'web_image',
        'mobile_image',
        'image_alt',

        'status',
    ];
}