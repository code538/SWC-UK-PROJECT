<?php

namespace App\Models\Calculator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaxYear extends Model
{
    protected $fillable = [
        'region_id',
        'name',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function taxCodes(): HasMany
    {
        return $this->hasMany(TaxCode::class);
    }

    public function taxBands(): HasMany
    {
        return $this->hasMany(TaxBand::class);
    }

    public function niBands(): HasMany
    {
        return $this->hasMany(NiBand::class);
    }

    public function studentLoanPlans(): HasMany
    {
        return $this->hasMany(StudentLoanPlan::class);
    }
}