<?php

namespace App\Services\Calculator;

use App\Models\Calculator\NiBand;
use App\Services\BaseService;
use Illuminate\Http\Request;

class NiBandService extends BaseService
{
    /**
     * Create or Update NI Band
     */
    public function save(Request $request)
    {
        return NiBand::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'tax_year_id'    => $request->tax_year_id,
                'ni_category_id' => $request->ni_category_id,
                'name'           => $request->name,
                'from_amount'    => $request->from_amount,
                'to_amount'      => $request->to_amount,
                'employee_rate'  => $request->employee_rate,
                'employer_rate'  => $request->employer_rate,
                'is_active'      => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * NI Band Details
     */
    public function details(int $id)
    {
        return NiBand::with([
                'taxYear',
                'category',
            ])
            ->find($id);
    }

    /**
     * NI Band List
     */
    public function all()
    {
        return NiBand::with([
                'taxYear',
                'category',
            ])
            ->latest()
            ->get();
    }

    /**
     * Delete NI Band
     */
    public function delete(int $id): bool
    {
        $band = NiBand::findOrFail($id);

        return $band->delete();
    }

    /**
     * Get NI Bands By Tax Year & Category
     */
    public function bandsByTaxYear(
        int $taxYearId,
        int $categoryId
    ) {
        return NiBand::where('tax_year_id', $taxYearId)
            ->where('ni_category_id', $categoryId)
            ->where('is_active', true)
            ->orderBy('from_amount')
            ->get();
    }
}