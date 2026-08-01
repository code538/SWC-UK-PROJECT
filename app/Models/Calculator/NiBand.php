<?php

namespace App\Models\Calculator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NiBand extends Model
{
    protected $fillable = [
        'tax_year_id',
        'ni_category_id',
        'name',
        'from_amount',
        'to_amount',
        'employee_rate',
        'employer_rate',
    ];

    protected $casts = [
        'from_amount' => 'decimal:2',
        'to_amount' => 'decimal:2',
        'employee_rate' => 'decimal:2',
        'employer_rate' => 'decimal:2',
    ];

    public function taxYear(): BelongsTo
    {
        return $this->belongsTo(TaxYear::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(NiCategory::class, 'ni_category_id');
    }
}