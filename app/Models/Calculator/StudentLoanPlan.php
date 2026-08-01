<?php

namespace App\Models\Calculator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentLoanPlan extends Model
{
    protected $fillable = [
        'tax_year_id',
        'name',
        'threshold',
        'rate',
        'is_active',
    ];

    protected $casts = [
        'threshold' => 'decimal:2',
        'rate' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function taxYear(): BelongsTo
    {
        return $this->belongsTo(TaxYear::class);
    }
}