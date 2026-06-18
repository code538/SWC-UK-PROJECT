<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'slug',

        'web_image',
        'mobile_image',
        'image_alt',

        'designation',

        'short_desc',

        'email',
        'phone',
        'address',

        'experience',

        'button1_name',
        'button1_url',

        'button2_name',
        'button2_url',

        'long_desc',

        'expertise',

        'desc2',

        'button3_name',
        'button3_url',

        'status',
    ];

    public function getExpertiseAttribute($value)
    {
        return $value
            ? explode(',', $value)
            : [];
    }
}