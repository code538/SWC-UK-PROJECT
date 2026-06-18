<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SrSecondSection extends Model
{
    protected $fillable = [
        'batch',

        'title',
        'title_meta',

        'description',
        'desc_meta',

        'image1',
        'image1_alt',

        'image2',
        'image2_alt',

        'image3',
        'image3_alt',

        'features',

        'status',
    ];

    public function getFeaturesAttribute($value)
    {
        return $value
            ? explode(',', $value)
            : [];
    }
}