<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSubCategorySection extends Model
{
    protected $fillable = [

        'service_sub_category_id',

        'section_name',
        'section_id',

        'order_by',

        'status'

    ];


    public function subcategory()
    {
        return $this->belongsTo(

            ServiceSubCategory::class,

            'service_sub_category_id'

        );
    }

    


}