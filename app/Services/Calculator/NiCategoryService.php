<?php

namespace App\Services\Calculator;

use App\Models\Calculator\NiCategory;

class NiCategoryService
{
    public function all()
    {
        return NiCategory::latest()->get();
    }

    public function find(int $id)
    {
        return NiCategory::findOrFail($id);
    }

    public function create(array $data)
    {
        return NiCategory::create($data);
    }

    public function update(int $id, array $data)
    {
        $category = $this->find($id);
        $category->update($data);

        return $category;
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }
}