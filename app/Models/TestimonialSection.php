<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialSection extends Model
{

    protected $fillable = [

        'batch',

        'title',

        'highlighted_title',

        'description',

        'name',

        'designation',

        'image',

        'rating',

        'status'

    ];


    protected $casts = [

        'rating'=>'float',

        'status'=>'boolean'

    ];


}