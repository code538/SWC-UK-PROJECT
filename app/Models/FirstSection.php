<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirstSection extends Model
{
    protected $fillable = [
        'page_name',
        'tags',

        'small_title',
        'highlighted_title',
        'title_meta',

        'short_description',
        'description',
        'description_meta',

        'button1_text',
        'button1_url',

        'button2_text',
        'button2_url',

        'number',
        'number_text',

        'rate',
        'rate_text',

        'support',
        'support_text',

        'status',
    ];
}