<?php

namespace App\Services\Calculator;

use App\Models\Calculator\Region;
use App\Models\Calculator\TaxBand;
use App\Models\Calculator\TaxYear;
use App\Models\Calculator\TaxCode;
use App\Models\Calculator\NiCategory;
use App\Models\Calculator\StudentLoanPlan;
use App\Models\Calculator\PensionOption;
use App\Models\Calculator\NiBand;



class SalaryCalculatorService
{
    public function calculate(array $data): array
    {
        /*
        |--------------------------------------------------------------------------
        | 1. Load Region
        |--------------------------------------------------------------------------
        */

        $region = Region::findOrFail(
            $data['region_id']
        );

        /*
        |--------------------------------------------------------------------------
        | 2. Load Active Tax Year
        |--------------------------------------------------------------------------
        */

        $taxYear = TaxYear::where(
            'region_id',
            $region->id
        )
        ->where(
            'is_active',
            true
        )
        ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | 3. Load Tax Code
        |--------------------------------------------------------------------------
        */

        $taxCode = $this->getTaxCode(
            $taxYear->id,
            $data['tax_code_id'] ?? null
        );

        /*
        |--------------------------------------------------------------------------
        | 4. Load NI Category
        |--------------------------------------------------------------------------
        */

        $niCategory = $this->getNiCategory(
            $data['ni_category_id'] ?? null
        );

        /*
        |--------------------------------------------------------------------------
        | 5. Load Student Loan
        |--------------------------------------------------------------------------
        */

        $studentLoanPlan = $this->getStudentLoanPlan(
            $taxYear->id,
            $data['student_loan_plan_id'] ?? null
        );

        /*
        |--------------------------------------------------------------------------
        | 6. Load Pension
        |--------------------------------------------------------------------------
        */

        $pensionOption = $this->getPensionOption(
            $data['pension_option_id'] ?? null
        );

        /*
        |--------------------------------------------------------------------------
        | 7. Convert Salary
        |--------------------------------------------------------------------------
        */

        $salary = $this->convertSalary(
            $data
        );

        /*
        |--------------------------------------------------------------------------
        | 8. Personal Allowance
        |--------------------------------------------------------------------------
        */

        $personalAllowance = $this->getPersonalAllowance(
            $taxCode,
            $salary['yearly']
        );

        /*
        |--------------------------------------------------------------------------
        | 9. Taxable Income
        |--------------------------------------------------------------------------
        */

        $taxableIncome = $this->calculateTaxableIncome(
            $salary['yearly'],
            $personalAllowance
        );

        /*
        |--------------------------------------------------------------------------
        | 10. Income Tax
        |--------------------------------------------------------------------------
        */

        $incomeTax = $this->calculateIncomeTax(
            $taxYear,
            $region,
            $taxableIncome
        );

        /*
        |--------------------------------------------------------------------------
        | 11. Employee NI
        |--------------------------------------------------------------------------
        */

        $employeeNI = $this->calculateEmployeeNI(
            $taxYear,
            $niCategory,
            $salary['yearly']
        );

        /*
        |--------------------------------------------------------------------------
        | 12. Employer NI
        |--------------------------------------------------------------------------
        */

        $employerNI = $this->calculateEmployerNI(
            $taxYear,
            $niCategory,
            $salary['yearly']
        );

        /*
        |--------------------------------------------------------------------------
        | 13. Student Loan
        |--------------------------------------------------------------------------
        */

        $studentLoan = $this->calculateStudentLoan(
            $studentLoanPlan,
            $salary['yearly']
        );

        /*
        |--------------------------------------------------------------------------
        | 14. Employee Pension
        |--------------------------------------------------------------------------
        */

        $employeePension = $this->calculateEmployeePension(
            $pensionOption,
            $salary['yearly']
        );

        /*
        |--------------------------------------------------------------------------
        | 15. Employer Pension
        |--------------------------------------------------------------------------
        */

        $employerPension = $this->calculateEmployerPension(
            $pensionOption,
            $salary['yearly']
        );

        /*
        |--------------------------------------------------------------------------
        | 16. Net Salary
        |--------------------------------------------------------------------------
        */

        $netSalary = $this->calculateNetSalary(
            $salary['yearly'],
            $incomeTax,
            $employeeNI,
            $studentLoan,
            $employeePension
        );

        /*
        |--------------------------------------------------------------------------
        | 17. Final Response
        |--------------------------------------------------------------------------
        */

        return $this->buildResponse(

            salary: $salary,

            region: $region,

            taxYear: $taxYear,

            taxCode: $taxCode,

            niCategory: $niCategory,

            studentLoanPlan: $studentLoanPlan,

            pensionOption: $pensionOption,

            personalAllowance: $personalAllowance,

            taxableIncome: $taxableIncome,

            incomeTax: $incomeTax,

            employeeNI: $employeeNI,

            employerNI: $employerNI,

            studentLoan: $studentLoan,

            employeePension: $employeePension,

            employerPension: $employerPension,

            netSalary: $netSalary
        );
    }


    private function getTaxCode(
        int $taxYearId,
        ?int $taxCodeId
    ): TaxCode {

        if ($taxCodeId) {

            return TaxCode::where('id', $taxCodeId)
                ->where('tax_year_id', $taxYearId)
                ->firstOrFail();
        }

        return TaxCode::where('tax_year_id', $taxYearId)
            ->where('code', '1257L')
            ->firstOrFail();
    }


    private function getNiCategory(
        ?int $niCategoryId
    ): NiCategory {

        if ($niCategoryId) {

            return NiCategory::findOrFail(
                $niCategoryId
            );
        }

        return NiCategory::where(
            'code',
            'A'
        )->firstOrFail();
    }

    private function getStudentLoanPlan(
        int $taxYearId,
        ?int $planId
    ): ?StudentLoanPlan {

        if (!$planId) {
            return null;
        }

        return StudentLoanPlan::where(
                'tax_year_id',
                $taxYearId
            )
            ->where(
                'id',
                $planId
            )
            ->first();
    }

    private function getPensionOption(
        ?int $pensionId
    ): ?PensionOption {

        if (!$pensionId) {
            return null;
        }

        return PensionOption::find(
            $pensionId
        );
    }


    private function convertSalary(
        array $data
    ): array {

        $salary = (float) $data['salary'];

        $hoursPerWeek = $data['hours_per_week'] ?? 40;

        $daysPerWeek = $data['days_per_week'] ?? 5;

        switch ($data['salary_type']) {

            case 'hourly':

                $hourly = $salary;
                $weekly = $hourly * $hoursPerWeek;
                $daily = $weekly / $daysPerWeek;
                $monthly = ($weekly * 52) / 12;
                $yearly = $weekly * 52;

                break;

            case 'daily':

                $daily = $salary;
                $weekly = $daily * $daysPerWeek;
                $hourly = $weekly / $hoursPerWeek;
                $monthly = ($weekly * 52) / 12;
                $yearly = $weekly * 52;

                break;

            case 'weekly':

                $weekly = $salary;
                $daily = $weekly / $daysPerWeek;
                $hourly = $weekly / $hoursPerWeek;
                $monthly = ($weekly * 52) / 12;
                $yearly = $weekly * 52;

                break;

            case 'monthly':

                $monthly = $salary;
                $yearly = $monthly * 12;
                $weekly = $yearly / 52;
                $daily = $weekly / $daysPerWeek;
                $hourly = $weekly / $hoursPerWeek;

                break;

            default:

                $yearly = $salary;
                $monthly = $yearly / 12;
                $weekly = $yearly / 52;
                $daily = $weekly / $daysPerWeek;
                $hourly = $weekly / $hoursPerWeek;
        }

        return [

            'yearly' => round($yearly, 2),

            'monthly' => round($monthly, 2),

            'weekly' => round($weekly, 2),

            'daily' => round($daily, 2),

            'hourly' => round($hourly, 2),
        ];
    }

    /**
     * Get Personal Allowance
     */
    private function getPersonalAllowance(
        TaxCode $taxCode,
        float $grossSalary
    ): float {

        $allowance = (float) $taxCode->personal_allowance;

        /*
        |--------------------------------------------------------------------------
        | Personal Allowance Reduction
        | HMRC Rule:
        | Income > £100,000
        | Every £2 over reduces allowance by £1
        |--------------------------------------------------------------------------
        */

        if ($grossSalary > 100000) {

            $reduction = ($grossSalary - 100000) / 2;

            $allowance -= $reduction;

            if ($allowance < 0) {
                $allowance = 0;
            }
        }

        return round($allowance, 2);
    }


    /**
     * Calculate Taxable Income
     */
    private function calculateTaxableIncome(
        float $grossSalary,
        float $personalAllowance
    ): float {

        return round(

            max(
                0,
                $grossSalary - $personalAllowance
            ),

            2

        );
    }


    /**
     * Calculate Net Salary
     */
    // private function calculateNetSalary(

    //     float $grossSalary,

    //     float $incomeTax,

    //     float $employeeNI,

    //     float $studentLoan,

    //     float $employeePension

    // ): float {

    //     return round(

    //         $grossSalary
    //         - $incomeTax
    //         - $employeeNI
    //         - $studentLoan
    //         - $employeePension,

    //         2

    //     );
    // }


    /**
     * Calculate Income Tax
     */
    private function calculateIncomeTax(
        TaxYear $taxYear,
        Region $region,
        float $taxableIncome
    ): float {

        if ($taxableIncome <= 0) {
            return 0;
        }

        $incomeTax = 0;

        $bands = TaxBand::where(
                'tax_year_id',
                $taxYear->id
            )
            ->where(
                'region_id',
                $region->id
            )
            ->orderBy(
                'band_order'
            )
            ->get();

        foreach ($bands as $band) {

            $from = (float) $band->from_amount;

            $to = $band->to_amount !== null
                ? (float) $band->to_amount
                : PHP_FLOAT_MAX;

            if ($taxableIncome <= $from) {
                continue;
            }

            $taxableAmount = min(
                $taxableIncome,
                $to
            ) - $from;

            if ($taxableAmount <= 0) {
                continue;
            }

            $incomeTax += $taxableAmount * (
                $band->rate / 100
            );
        }

        return round(
            $incomeTax,
            2
        );
    }


    /**
     * Calculate Employee National Insurance
     */
    private function calculateEmployeeNI(
        TaxYear $taxYear,
        NiCategory $niCategory,
        float $grossSalary
    ): float {

        if ($grossSalary <= 0) {
            return 0;
        }

        $employeeNI = 0;

        $bands = NiBand::where('tax_year_id', $taxYear->id)
            ->where('ni_category_id', $niCategory->id)
            ->orderBy('from_amount')
            ->get();

        foreach ($bands as $band) {

            $from = (float) $band->from_amount;

            $to = $band->to_amount !== null
                ? (float) $band->to_amount
                : PHP_FLOAT_MAX;

            if ($grossSalary <= $from) {
                continue;
            }

            $niableAmount = min($grossSalary, $to) - $from;

            if ($niableAmount <= 0) {
                continue;
            }

            $employeeNI += $niableAmount * (
                $band->employee_rate / 100
            );
        }

        return round($employeeNI, 2);
    }



    /**
     * Calculate Employer National Insurance
     */
    private function calculateEmployerNI(
        TaxYear $taxYear,
        NiCategory $niCategory,
        float $grossSalary
    ): float {

        if ($grossSalary <= 0) {
            return 0;
        }

        $employerNI = 0;

        $bands = NiBand::where('tax_year_id', $taxYear->id)
            ->where('ni_category_id', $niCategory->id)
            ->orderBy('from_amount')
            ->get();

        foreach ($bands as $band) {

            $from = (float) $band->from_amount;

            $to = $band->to_amount !== null
                ? (float) $band->to_amount
                : PHP_FLOAT_MAX;

            if ($grossSalary <= $from) {
                continue;
            }

            $niableAmount = min($grossSalary, $to) - $from;

            if ($niableAmount <= 0) {
                continue;
            }

            $employerNI += $niableAmount * (
                $band->employer_rate / 100
            );
        }

        return round($employerNI, 2);
    }


    /**
     * Calculate Student Loan Deduction
     */
    private function calculateStudentLoan(
        ?StudentLoanPlan $studentLoanPlan,
        float $grossSalary
    ): float {

        // No student loan selected
        if (!$studentLoanPlan) {
            return 0;
        }

        // Salary below threshold
        if ($grossSalary <= $studentLoanPlan->threshold) {
            return 0;
        }

        $deductibleAmount = $grossSalary - $studentLoanPlan->threshold;

        $studentLoan = $deductibleAmount * (
            $studentLoanPlan->rate / 100
        );

        return round($studentLoan, 2);
    }


    /**
     * Calculate Employee Pension
     */
    private function calculateEmployeePension(
        ?PensionOption $pensionOption,
        float $grossSalary
    ): float {

        // No pension selected
        if (!$pensionOption || !$pensionOption->is_active) {
            return 0;
        }

        // Percentage based pension
        if ($pensionOption->is_percentage) {

            return round(
                $grossSalary * ($pensionOption->employee_rate / 100),
                2
            );
        }

        // Fixed amount pension
        return round(
            (float) $pensionOption->employee_rate,
            2
        );
    }


    /**
     * Calculate Employer Pension
     */
    private function calculateEmployerPension(
        ?PensionOption $pensionOption,
        float $grossSalary
    ): float {

        // No pension selected
        if (!$pensionOption || !$pensionOption->is_active) {
            return 0;
        }

        // Percentage based pension
        if ($pensionOption->is_percentage) {

            return round(
                $grossSalary * ($pensionOption->employer_rate / 100),
                2
            );
        }

        // Fixed amount pension
        return round(
            (float) $pensionOption->employer_rate,
            2
        );
    }


    /**
     * Calculate Net Salary
     */
    private function calculateNetSalary(
        float $grossSalary,
        float $incomeTax,
        float $employeeNI,
        float $studentLoan,
        float $employeePension
    ): float {

        $totalDeduction =
            $incomeTax
            + $employeeNI
            + $studentLoan
            + $employeePension;

        return round(
            max(0, $grossSalary - $totalDeduction),
            2
        );
    }


    /**
     * Build Final Response
     */
    private function buildResponse(

        array $salary,

        Region $region,

        TaxYear $taxYear,

        TaxCode $taxCode,

        NiCategory $niCategory,

        ?StudentLoanPlan $studentLoanPlan,

        ?PensionOption $pensionOption,

        float $personalAllowance,

        float $taxableIncome,

        float $incomeTax,

        float $employeeNI,

        float $employerNI,

        float $studentLoan,

        float $employeePension,

        float $employerPension,

        float $netSalary

    ): array {

        return [

            /*
            |--------------------------------------------------------------------------
            | General
            |--------------------------------------------------------------------------
            */

            'region' => [
                'id' => $region->id,
                'name' => $region->name,
                'code' => $region->code,
            ],

            'tax_year' => [
                'id' => $taxYear->id,
                'name' => $taxYear->name,
            ],

            'tax_code' => [
                'id' => $taxCode->id,
                'code' => $taxCode->code,
            ],

            'ni_category' => [
                'id' => $niCategory->id,
                'code' => $niCategory->code,
            ],

            'student_loan' => $studentLoanPlan ? [
                'id' => $studentLoanPlan->id,
                'name' => $studentLoanPlan->name,
            ] : null,

            'pension' => $pensionOption ? [
                'id' => $pensionOption->id,
                'name' => $pensionOption->name,
            ] : null,

            /*
            |--------------------------------------------------------------------------
            | Salary
            |--------------------------------------------------------------------------
            */

            'salary' => [

                'yearly' => $salary['yearly'],

                'monthly' => $salary['monthly'],

                'weekly' => $salary['weekly'],

                'daily' => $salary['daily'],

                'hourly' => $salary['hourly'],
            ],

            /*
            |--------------------------------------------------------------------------
            | Tax
            |--------------------------------------------------------------------------
            */

            'personal_allowance' => $personalAllowance,

            'taxable_income' => $taxableIncome,

            'income_tax' => $incomeTax,

            /*
            |--------------------------------------------------------------------------
            | National Insurance
            |--------------------------------------------------------------------------
            */

            'employee_ni' => $employeeNI,

            'employer_ni' => $employerNI,

            /*
            |--------------------------------------------------------------------------
            | Student Loan
            |--------------------------------------------------------------------------
            */

            'student_loan_deduction' => $studentLoan,

            /*
            |--------------------------------------------------------------------------
            | Pension
            |--------------------------------------------------------------------------
            */

            'employee_pension' => $employeePension,

            'employer_pension' => $employerPension,

            /*
            |--------------------------------------------------------------------------
            | Summary
            |--------------------------------------------------------------------------
            */

            'total_deduction' => round(
                $incomeTax
                + $employeeNI
                + $studentLoan
                + $employeePension,
                2
            ),

            'net_salary' => $netSalary,
        ];
    }







}