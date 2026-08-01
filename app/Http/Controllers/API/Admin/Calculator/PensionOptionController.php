<?php

namespace App\Http\Controllers\API\Admin\Calculator;

use App\Http\Controllers\Controller;
use App\Services\Calculator\PensionOptionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PensionOptionController extends Controller
{
    use ApiResponse;

    protected PensionOptionService $pensionOptionService;

    public function __construct(
        PensionOptionService $pensionOptionService
    ) {
        $this->pensionOptionService = $pensionOptionService;
    }

    /**
     * Create / Update Pension Option
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'employee_rate' => 'required|numeric|min:0|max:100',

            'employer_rate' => 'required|numeric|min:0|max:100',

            'is_percentage' => 'nullable|boolean',

            'is_active' => 'nullable|boolean',
        ]);

        $pensionOption = $this->pensionOptionService->save(
            $request
        );

        return $this->success(
            $pensionOption,
            'Pension option saved successfully.'
        );
    }

    /**
     * Pension Option Details
     */
    public function details($id)
    {
        $pensionOption = $this->pensionOptionService->details(
            $id
        );

        if (!$pensionOption) {
            return $this->error(
                'Pension option not found.',
                [],
                404
            );
        }

        return $this->success(
            $pensionOption,
            'Pension option fetched successfully.'
        );
    }

    /**
     * Pension Option List
     */
    public function list()
    {
        return $this->success(
            $this->pensionOptionService->all(),
            'Pension option list fetched successfully.'
        );
    }

    /**
     * Delete Pension Option
     */
    public function delete($id)
    {
        $pensionOption = $this->pensionOptionService->details(
            $id
        );

        if (!$pensionOption) {
            return $this->error(
                'Pension option not found.',
                [],
                404
            );
        }

        $this->pensionOptionService->delete(
            $id
        );

        return $this->success(
            [],
            'Pension option deleted successfully.'
        );
    }
}