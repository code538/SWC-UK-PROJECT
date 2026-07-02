<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrComplianceThirdSection extends Model
{
    protected $fillable = [

        'batch',

        'title',

        'highlighted_title',

        'title_meta',

        'description',

        'desc_meta',

        'status'

    ];
}