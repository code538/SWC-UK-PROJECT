<?php

namespace App\Services\Calculator;

use App\Models\Calculator\TaxBand;

class TaxBandService
{
    public function all()
    {
        return TaxBand::with('taxYear')
            ->orderBy('band_order')
            ->get();
    }

    public function find(int $id)
    {
        return TaxBand::with('taxYear')->findOrFail($id);
    }

    public function create(array $data)
    {
        return TaxBand::create($data);
    }

    public function update(int $id, array $data)
    {
        $band = $this->find($id);
        $band->update($data);

        return $band;
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }

    public function bandsByTaxYear(int $taxYearId)
    {
        return TaxBand::where('tax_year_id', $taxYearId)
            ->orderBy('band_order')
            ->get();
    }
}