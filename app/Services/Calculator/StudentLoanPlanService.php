<?php

namespace App\Services\Calculator;

use App\Models\Calculator\StudentLoanPlan;
use App\Services\BaseService;
use Illuminate\Http\Request;

class StudentLoanPlanService extends BaseService
{
    /**
     * Create or Update Student Loan Plan
     */
    public function save(Request $request)
    {
        return StudentLoanPlan::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'tax_year_id' => $request->tax_year_id,
                'name'        => $request->name,
                'threshold'   => $request->threshold,
                'rate'        => $request->rate,
                'is_active'   => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * Student Loan Plan Details
     */
    public function details(int $id)
    {
        return StudentLoanPlan::with('taxYear')
            ->find($id);
    }

    /**
     * Student Loan Plan List
     */
    public function all()
    {
        return StudentLoanPlan::with('taxYear')
            ->latest()
            ->get();
    }

    /**
     * Delete Student Loan Plan
     */
    public function delete(int $id): bool
    {
        $plan = StudentLoanPlan::findOrFail($id);

        return $plan->delete();
    }
}