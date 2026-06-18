<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamSecondSection extends Model
{
    protected $fillable = [
        'batch',
        'title',
        'title_meta',
        'description',
        'desc_meta',
        'status',
    ];
}