<?php

namespace App\Services\Calculator;

use App\Models\Calculator\TaxYear;

class TaxYearService
{
    public function all()
    {
        return TaxYear::with('region')->latest()->get();
    }

    public function find(int $id)
    {
        return TaxYear::with('region')->findOrFail($id);
    }

    public function create(array $data)
    {
        return TaxYear::create($data);
    }

    public function update(int $id, array $data)
    {
        $taxYear = $this->find($id);
        $taxYear->update($data);

        return $taxYear;
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }

    public function activeByRegion(int $regionId)
    {
        return TaxYear::where('region_id', $regionId)
            ->where('is_active', true)
            ->first();
    }
}