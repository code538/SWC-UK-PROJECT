<?php

namespace App\Models\Calculator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxCode extends Model
{
    protected $fillable = [
        'tax_year_id',
        'code',
        'personal_allowance',
        'description',
    ];

    protected $casts = [
        'personal_allowance' => 'decimal:2',
    ];

    public function taxYear(): BelongsTo
    {
        return $this->belongsTo(TaxYear::class);
    }
}