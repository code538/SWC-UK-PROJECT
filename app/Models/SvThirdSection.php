<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SvThirdSection extends Model
{
    protected $fillable = [

        'batch',

        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'card1_title',
        'card2_title',
        'card3_title',
        'card4_title',

        'title2',
        'short_desc',

        'button_name',
        'button_url',

        'status'

    ];
}