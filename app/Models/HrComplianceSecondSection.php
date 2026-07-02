<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrComplianceSecondSection extends Model
{
    protected $fillable = [

        'batch',

        'title',

        'description',

        'title_meta',

        'desc_meta',

        'features',

        'button_name',

        'button_url',

        'button_note',

        'status'

    ];

    protected $casts = [

        'features' => 'array'

    ];
}