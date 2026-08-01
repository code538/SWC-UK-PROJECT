<?php

namespace App\Models\Calculator;

use Illuminate\Database\Eloquent\Model;

class PensionOption extends Model
{
    protected $fillable = [
        'name',
        'code',
        'employee_rate',
        'employer_rate',
        'is_percentage',
        'is_active',
    ];

    protected $casts = [
        'employee_rate' => 'decimal:2',
        'employer_rate' => 'decimal:2',
        'is_percentage' => 'boolean',
        'is_active' => 'boolean',
    ];
}