<?php

namespace App\Http\Controllers\API\Admin\Calculator;

use App\Http\Controllers\Controller;
use App\Services\Calculator\TaxYearService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TaxYearController extends Controller
{
    use ApiResponse;

    protected TaxYearService $taxYearService;

    public function __construct(TaxYearService $taxYearService)
    {
        $this->taxYearService = $taxYearService;
    }

    /**
     * Create / Update Tax Year
     */
    public function save(Request $request)
    {
        $request->validate([
            'region_id'  => 'required|exists:regions,id',
            'name'       => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
            'is_active'  => 'nullable|boolean',
        ]);

        $taxYear = $this->taxYearService->save($request);

        return $this->success(
            $taxYear,
            'Tax year saved successfully.'
        );
    }

    /**
     * Tax Year Details
     */
    public function details($id)
    {
        $taxYear = $this->taxYearService->details($id);

        if (!$taxYear) {
            return $this->error(
                'Tax year not found.',
                [],
                404
            );
        }

        return $this->success(
            $taxYear,
            'Tax year fetched successfully.'
        );
    }

    /**
     * Tax Year List
     */
    public function list()
    {
        return $this->success(
            $this->taxYearService->all(),
            'Tax year list fetched successfully.'
        );
    }

    /**
     * Delete Tax Year
     */
    public function delete($id)
    {
        $taxYear = $this->taxYearService->details($id);

        if (!$taxYear) {
            return $this->error(
                'Tax year not found.',
                [],
                404
            );
        }

        $this->taxYearService->delete($id);

        return $this->success(
            [],
            'Tax year deleted successfully.'
        );
    }
}