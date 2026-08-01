<?php

namespace App\Services\Calculator;

use App\Models\Calculator\PensionOption;
use App\Services\BaseService;
use Illuminate\Http\Request;

class PensionOptionService extends BaseService
{
    /**
     * Create or Update Pension Option
     */
    public function save(Request $request)
    {
        return PensionOption::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name'            => $request->name,
                'code'            => strtoupper($request->code),
                'employee_rate'   => $request->employee_rate,
                'employer_rate'   => $request->employer_rate,
                'is_percentage'   => $request->boolean('is_percentage'),
                'is_active'       => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * Pension Option Details
     */
    public function details(int $id)
    {
        return PensionOption::find($id);
    }

    /**
     * Pension Option List
     */
    public function all()
    {
        return PensionOption::latest()->get();
    }

    /**
     * Delete Pension Option
     */
    public function delete(int $id): bool
    {
        $option = PensionOption::findOrFail($id);

        return $option->delete();
    }
}