<?php

namespace App\Models\Calculator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NiCategory extends Model
{
    protected $fillable = [
        'code',
        'description',
    ];

    public function niBands(): HasMany
    {
        return $this->hasMany(NiBand::class);
    }
}