<?php

namespace App\Http\Controllers\API\Admin\Calculator;

use App\Http\Controllers\Controller;
use App\Services\Calculator\TaxCodeService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TaxCodeController extends Controller
{
    use ApiResponse;

    protected TaxCodeService $taxCodeService;

    public function __construct(TaxCodeService $taxCodeService)
    {
        $this->taxCodeService = $taxCodeService;
    }

    /**
     * Create / Update Tax Code
     */
    public function save(Request $request)
    {
        $request->validate([
            'tax_year_id'         => 'required|exists:tax_years,id',
            'code'                => 'required|string|max:20',
            'personal_allowance'  => 'required|numeric|min:0',
            'description'         => 'nullable|string|max:500',
        ]);

        $taxCode = $this->taxCodeService->save($request);

        return $this->success(
            $taxCode,
            'Tax code saved successfully.'
        );
    }

    /**
     * Tax Code Details
     */
    public function details($id)
    {
        $taxCode = $this->taxCodeService->details($id);

        if (!$taxCode) {
            return $this->error(
                'Tax code not found.',
                [],
                404
            );
        }

        return $this->success(
            $taxCode,
            'Tax code fetched successfully.'
        );
    }

    /**
     * Tax Code List
     */
    public function list()
    {
        return $this->success(
            $this->taxCodeService->all(),
            'Tax code list fetched successfully.'
        );
    }

    /**
     * Delete Tax Code
     */
    public function delete($id)
    {
        $taxCode = $this->taxCodeService->details($id);

        if (!$taxCode) {
            return $this->error(
                'Tax code not found.',
                [],
                404
            );
        }

        $this->taxCodeService->delete($id);

        return $this->success(
            [],
            'Tax code deleted successfully.'
        );
    }
}