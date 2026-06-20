<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    protected $fillable = [

        'service_category_id',

        'name',
        'slug',

        'order',

        'status'

    ];


    public function category()
    {
        return $this->belongsTo(

            ServiceCategory::class,

            'service_category_id'

        );
    }



}