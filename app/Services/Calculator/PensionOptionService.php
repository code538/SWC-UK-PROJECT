<?php

namespace App\Services\Calculator;

use App\Models\Calculator\PensionOption;

class PensionOptionService
{
    public function all()
    {
        return PensionOption::latest()->get();
    }

    public function find(int $id)
    {
        return PensionOption::findOrFail($id);
    }

    public function create(array $data)
    {
        return PensionOption::create($data);
    }

    public function update(int $id, array $data)
    {
        $option = $this->find($id);
        $option->update($data);

        return $option;
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }
}