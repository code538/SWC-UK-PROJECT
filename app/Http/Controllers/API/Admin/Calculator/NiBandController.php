<?php

namespace App\Http\Controllers\API\Admin\Calculator;

use App\Http\Controllers\Controller;
use App\Services\Calculator\NiBandService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class NiBandController extends Controller
{
    use ApiResponse;

    protected NiBandService $niBandService;

    public function __construct(
        NiBandService $niBandService
    ) {
        $this->niBandService = $niBandService;
    }

    /**
     * Create / Update NI Band
     */
    public function save(Request $request)
    {
        $request->validate([
            'tax_year_id'    => 'required|exists:tax_years,id',
            'ni_category_id' => 'required|exists:ni_categories,id',

            'name' => 'required|string|max:255',

            'from_amount' => 'required|numeric|min:0',
            'to_amount'   => 'nullable|numeric|gte:from_amount',

            'employee_rate' => 'required|numeric|min:0|max:100',
            'employer_rate' => 'required|numeric|min:0|max:100',
        ]);

        $niBand = $this->niBandService->save(
            $request
        );

        return $this->success(
            $niBand,
            'NI band saved successfully.'
        );
    }

    /**
     * NI Band Details
     */
    public function details($id)
    {
        $niBand = $this->niBandService->details(
            $id
        );

        if (!$niBand) {
            return $this->error(
                'NI band not found.',
                [],
                404
            );
        }

        return $this->success(
            $niBand,
            'NI band fetched successfully.'
        );
    }

    /**
     * NI Band List
     */
    public function list()
    {
        return $this->success(
            $this->niBandService->all(),
            'NI band list fetched successfully.'
        );
    }

    /**
     * Delete NI Band
     */
    public function delete($id)
    {
        $niBand = $this->niBandService->details(
            $id
        );

        if (!$niBand) {
            return $this->error(
                'NI band not found.',
                [],
                404
            );
        }

        $this->niBandService->delete(
            $id
        );

        return $this->success(
            [],
            'NI band deleted successfully.'
        );
    }
}