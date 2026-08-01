<?php

namespace App\Services\Calculator;

use App\Models\Calculator\TaxBand;
use App\Services\BaseService;
use Illuminate\Http\Request;

class TaxBandService extends BaseService
{
    /**
     * Create or Update Tax Band
     */
    public function save(Request $request)
    {
        return TaxBand::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'tax_year_id' => $request->tax_year_id,
                'region_id'   => $request->region_id,
                'name'        => $request->name,
                'from_amount' => $request->from_amount,
                'to_amount'   => $request->to_amount,
                'rate'        => $request->rate,
                'band_order'  => $request->band_order,
                'is_active'   => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * Tax Band Details
     */
    public function details(int $id)
    {
        return TaxBand::with([
                'taxYear',
                'region',
            ])
            ->find($id);
    }

    /**
     * Tax Band List
     */
    public function all()
    {
        return TaxBand::with([
                'taxYear',
                'region',
            ])
            ->orderBy('band_order')
            ->latest('id')
            ->get();
    }

    /**
     * Delete Tax Band
     */
    public function delete(int $id): bool
    {
        $band = TaxBand::findOrFail($id);

        return $band->delete();
    }

    /**
     * Get Tax Bands By Tax Year & Region
     */
    public function bandsByTaxYear(
        int $taxYearId,
        int $regionId
    ) {
        return TaxBand::where('tax_year_id', $taxYearId)
            ->where('region_id', $regionId)
            ->where('is_active', true)
            ->orderBy('band_order')
            ->get();
    }
}