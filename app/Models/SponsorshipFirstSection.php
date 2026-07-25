<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorshipFirstSection extends Model
{
    protected $fillable = [

        'batch',

        'title',

        'highlighted_title',

        'description',

        'title_meta',

        'desc_meta',

        'statistics',

        'certifications',

        'button_name',

        'button_url',

        'web_image',

        'mobile_image',

        'image_alt',

        'card_badge',

        'card_title',

        'card_description',

        'status'

    ];

    protected $casts = [

        'statistics' => 'array',

        'certifications' => 'array'

    ];
}