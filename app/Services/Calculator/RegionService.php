<?php

namespace App\Services\Calculator;

use App\Models\Calculator\Region;
use App\Services\BaseService;
use Illuminate\Http\Request;

class RegionService extends BaseService
{
    /**
     * Create or Update Region
     */
    public function save(Request $request)
    {
        return Region::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'country_id' => $request->country_id,
                'name'       => $request->name,
                'code'       => strtoupper($request->code),
                'is_active'  => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * Region Details
     */
    public function details(int $id)
    {
        return Region::with('country')
            ->find($id);
    }

    /**
     * Region List
     */
    public function all()
    {
        return Region::with('country')
            ->latest()
            ->get();
    }

    /**
     * Delete Region
     */
    public function delete(int $id): bool
    {
        $region = Region::findOrFail($id);

        return $region->delete();
    }
}