<?php

namespace App\Models\Calculator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxBand extends Model
{
    protected $fillable = [
        'tax_year_id',
        'region_id',
        'name',
        'from_amount',
        'to_amount',
        'rate',
        'band_order',
        'is_active',
    ];

    protected $casts = [
        'from_amount' => 'decimal:2',
        'to_amount' => 'decimal:2',
        'rate' => 'decimal:2',
        'band_order' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Tax Year
     */
    public function taxYear(): BelongsTo
    {
        return $this->belongsTo(TaxYear::class);
    }

    /**
     * Region
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}