<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SrFifthSection extends Model
{
    protected $fillable = [
        'title',
        'title_meta',

        'description',
        'desc_meta',

        'position',

        'heading',
        'desc2',

        'status',
    ];
}