<?php

namespace App\Http\Controllers\API\Public;

use App\Http\Controllers\Controller;
use App\Services\Calculator\SalaryCalculatorService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SalaryCalculatorController extends Controller
{
    use ApiResponse;

    protected SalaryCalculatorService $salaryCalculatorService;

    public function __construct(
        SalaryCalculatorService $salaryCalculatorService
    ) {
        $this->salaryCalculatorService = $salaryCalculatorService;
    }

    /**
     * Calculate UK Salary
     */
    // public function calculate(Request $request)
    // {
    //     $request->validate([

    //         'region_id' => [
    //             'required',
    //             'exists:regions,id'
    //         ],

    //         'tax_year_id' => [
    //             'required',
    //             'exists:tax_years,id'
    //         ],

    //         'salary_type' => [
    //             'required',
    //             'in:yearly,monthly,weekly,daily,hourly'
    //         ],

    //         'salary' => [
    //             'required',
    //             'numeric',
    //             'min:0'
    //         ],

    //         'tax_code' => [
    //             'required',
    //             'string'
    //         ],

    //         'ni_category' => [
    //             'required',
    //             'string'
    //         ],

    //         'student_loan_plan' => [
    //             'nullable',
    //             'string'
    //         ],

    //         'pension_option_id' => [
    //             'nullable',
    //             'exists:pension_options,id'
    //         ],

    //         'employee_pension_rate' => [
    //             'nullable',
    //             'numeric',
    //             'min:0',
    //             'max:100'
    //         ],

    //         'hours_per_week' => [
    //             'nullable',
    //             'numeric',
    //             'min:1'
    //         ],

    //         'days_per_week' => [
    //             'nullable',
    //             'numeric',
    //             'min:1',
    //             'max:7'
    //         ]
    //     ]);

    //     $result = $this->salaryCalculatorService
    //         ->calculate($request);

    //     return $this->success(
    //         $result,
    //         'Salary calculated successfully.'
    //     );
    // }

    public function calculate(Request $request)
    {
        $request->validate([

            'salary'=>'required|numeric|min:1',

            'salary_type'=>'required|in:hourly,daily,weekly,monthly,yearly',

            'region_id'=>'required|exists:regions,id',

            'tax_code_id'=>'nullable|exists:tax_codes,id',

            'ni_category_id'=>'nullable|exists:ni_categories,id',

            'student_loan_plan_id'=>'nullable|exists:student_loan_plans,id',

            'pension_option_id'=>'nullable|exists:pension_options,id',

            'hours_per_week'=>'nullable|numeric',

            'days_per_week'=>'nullable|numeric',

        ]);

        return $this->success(

            $this->salaryCalculatorService
                ->calculate($request->all()),

            'Salary calculated successfully.'

        );
    }
}