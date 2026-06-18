<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SrSeventhSection extends Model
{
    protected $fillable = [
        'title',
        'highlighted_title',

        'description',

        'title_meta',
        'desc_meta',

        'button_name',
        'button_url',

        'button2_name',
        'button2_url',

        'status',
    ];
}