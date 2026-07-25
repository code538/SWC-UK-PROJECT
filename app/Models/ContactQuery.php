<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactQuery extends Model
{
    protected $fillable = [

        'full_name',

        'email',

        'phone',

        'service_category_id',

        'service_sub_category_id',

        'description',

        'source',

        'status',

        'admin_note',

        'assigned_to',

        'follow_up_at',

        'user_agent'

    ];

    protected $casts = [

        'follow_up_at' => 'datetime'

    ];


    public function category()
    {
        return $this->belongsTo(
            ServiceCategory::class,
            'service_category_id'
        );
    }


    public function subCategory()
    {
        return $this->belongsTo(
            ServiceSubCategory::class,
            'service_sub_category_id'
        );
    }


    public function employee()
    {
        return $this->belongsTo(
            User::class,
            'assigned_to'
        );
    }
}