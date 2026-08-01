<?php

namespace App\Services\Calculator;

use App\Models\Calculator\StudentLoanPlan;

class StudentLoanPlanService
{
    public function all()
    {
        return StudentLoanPlan::with('taxYear')->latest()->get();
    }

    public function find(int $id)
    {
        return StudentLoanPlan::with('taxYear')->findOrFail($id);
    }

    public function create(array $data)
    {
        return StudentLoanPlan::create($data);
    }

    public function update(int $id, array $data)
    {
        $plan = $this->find($id);
        $plan->update($data);

        return $plan;
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }
}