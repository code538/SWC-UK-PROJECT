<?php

namespace App\Services\Calculator;

use App\Models\Calculator\NiCategory;
use App\Services\BaseService;
use Illuminate\Http\Request;

class NiCategoryService extends BaseService
{
    /**
     * Create or Update NI Category
     */
    public function save(Request $request)
    {
        return NiCategory::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'code'        => strtoupper($request->code),
                'description' => $request->description,
                'is_active'   => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * NI Category Details
     */
    public function details(int $id)
    {
        return NiCategory::find($id);
    }

    /**
     * NI Category List
     */
    public function all()
    {
        return NiCategory::latest()->get();
    }

    /**
     * Delete NI Category
     */
    public function delete(int $id): bool
    {
        $category = NiCategory::findOrFail($id);

        return $category->delete();
    }
}