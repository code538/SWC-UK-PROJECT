<?php

namespace App\Http\Controllers\API\Admin\Calculator;

use App\Http\Controllers\Controller;
use App\Services\Calculator\StudentLoanPlanService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class StudentLoanPlanController extends Controller
{
    use ApiResponse;

    protected StudentLoanPlanService $studentLoanPlanService;

    public function __construct(
        StudentLoanPlanService $studentLoanPlanService
    ) {
        $this->studentLoanPlanService = $studentLoanPlanService;
    }

    /**
     * Create / Update Student Loan Plan
     */
    public function save(Request $request)
    {
        $request->validate([
            'tax_year_id' => 'required|exists:tax_years,id',

            'name' => 'required|string|max:100',

            'threshold' => 'required|numeric|min:0',

            'rate' => 'required|numeric|min:0|max:100',

            'is_active' => 'nullable|boolean',
        ]);

        $studentLoanPlan = $this->studentLoanPlanService->save(
            $request
        );

        return $this->success(
            $studentLoanPlan,
            'Student loan plan saved successfully.'
        );
    }

    /**
     * Student Loan Plan Details
     */
    public function details($id)
    {
        $studentLoanPlan = $this->studentLoanPlanService->details(
            $id
        );

        if (!$studentLoanPlan) {
            return $this->error(
                'Student loan plan not found.',
                [],
                404
            );
        }

        return $this->success(
            $studentLoanPlan,
            'Student loan plan fetched successfully.'
        );
    }

    /**
     * Student Loan Plan List
     */
    public function list()
    {
        return $this->success(
            $this->studentLoanPlanService->all(),
            'Student loan plan list fetched successfully.'
        );
    }

    /**
     * Delete Student Loan Plan
     */
    public function delete($id)
    {
        $studentLoanPlan = $this->studentLoanPlanService->details(
            $id
        );

        if (!$studentLoanPlan) {
            return $this->error(
                'Student loan plan not found.',
                [],
                404
            );
        }

        $this->studentLoanPlanService->delete(
            $id
        );

        return $this->success(
            [],
            'Student loan plan deleted successfully.'
        );
    }
}