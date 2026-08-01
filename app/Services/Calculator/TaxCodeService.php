<?php

namespace App\Services\Calculator;

use App\Models\Calculator\TaxCode;
use App\Services\BaseService;
use Illuminate\Http\Request;

class TaxCodeService extends BaseService
{
    /**
     * Create or Update Tax Code
     */
    public function save(Request $request)
    {
        return TaxCode::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'tax_year_id'         => $request->tax_year_id,
                'code'                => strtoupper($request->code),
                'personal_allowance'  => $request->personal_allowance,
                'description'         => $request->description,
                'is_active'           => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * Tax Code Details
     */
    public function details(int $id)
    {
        return TaxCode::with('taxYear')
            ->find($id);
    }

    /**
     * Tax Code List
     */
    public function all()
    {
        return TaxCode::with('taxYear')
            ->latest()
            ->get();
    }

    /**
     * Delete Tax Code
     */
    public function delete(int $id): bool
    {
        $taxCode = TaxCode::findOrFail($id);

        return $taxCode->delete();
    }
}