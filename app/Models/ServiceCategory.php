<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = [

        'name',
        'slug',
        'order',
        'status'

    ];

    public function subcategories()
    {

        return $this->hasMany(

            ServiceSubCategory::class,

            'service_category_id'

        );

    }
}