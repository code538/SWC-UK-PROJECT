<?php

namespace App\Services\Calculator;

use App\Models\Calculator\TaxYear;
use App\Services\BaseService;
use Illuminate\Http\Request;

class TaxYearService extends BaseService
{
    /**
     * Create or Update Tax Year
     */
    public function save(Request $request)
    {
        return TaxYear::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'region_id'  => $request->region_id,
                'name'       => $request->name,
                'start_date' => $request->start_date,
                'end_date'   => $request->end_date,
                'is_active'  => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * Tax Year Details
     */
    public function details(int $id)
    {
        return TaxYear::with('region')
            ->find($id);
    }

    /**
     * Tax Year List
     */
    public function all()
    {
        return TaxYear::with('region')
            ->latest()
            ->get();
    }

    /**
     * Delete Tax Year
     */
    public function delete(int $id): bool
    {
        $taxYear = TaxYear::findOrFail($id);

        return $taxYear->delete();
    }

    /**
     * Get Active Tax Year By Region
     */
    public function activeByRegion(int $regionId)
    {
        return TaxYear::where('region_id', $regionId)
            ->where('is_active', true)
            ->first();
    }
}