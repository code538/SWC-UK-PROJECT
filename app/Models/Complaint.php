<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [

        'organization_name',

        'group_name',

        'full_name',

        'email',

        'phone',

        'complaint_type',

        'description',

        'attachment',

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


    public function employee()
    {
        return $this->belongsTo(

            User::class,

            'assigned_to'

        );
    }

}