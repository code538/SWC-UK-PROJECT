<?php

namespace App\Services\Calculator;

use App\Models\Calculator\TaxCode;

class TaxCodeService
{
    public function all()
    {
        return TaxCode::with('taxYear')->latest()->get();
    }

    public function find(int $id)
    {
        return TaxCode::with('taxYear')->findOrFail($id);
    }

    public function create(array $data)
    {
        return TaxCode::create($data);
    }

    public function update(int $id, array $data)
    {
        $taxCode = $this->find($id);
        $taxCode->update($data);

        return $taxCode;
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }
}