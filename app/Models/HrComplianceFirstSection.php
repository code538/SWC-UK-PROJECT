<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrComplianceFirstSection extends Model
{
    protected $fillable = [

        'batch',

        'title',

        'highlighted_text',

        'title_meta',

        'description',

        'desc_meta',

        'bg_web_image',

        'bg_mobile_image',

        'image_alt',

        'status'

    ];
}