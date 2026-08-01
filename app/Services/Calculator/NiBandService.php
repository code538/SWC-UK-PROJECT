<?php

namespace App\Services\Calculator;

use App\Models\Calculator\NiBand;

class NiBandService
{
    public function all()
    {
        return NiBand::with(['taxYear', 'category'])->latest()->get();
    }

    public function find(int $id)
    {
        return NiBand::with(['taxYear', 'category'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return NiBand::create($data);
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

    public function bandsByTaxYear(int $taxYearId, int $categoryId)
    {
        return NiBand::where('tax_year_id', $taxYearId)
            ->where('ni_category_id', $categoryId)
            ->get();
    }
}