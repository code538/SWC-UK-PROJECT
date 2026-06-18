<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SrFirstSection extends Model
{
    protected $fillable = [
        'title',
        'highlighted_text',
        'title_meta',

        'description',
        'desc_meta',

        'web_image',
        'mobile_image',
        'image_alt',

        'title2',
        'title3',

        'feature',

        'status',
    ];

    public function getFeatureAttribute($value)
    {
        return $value
            ? explode(',', $value)
            : [];
    }
}