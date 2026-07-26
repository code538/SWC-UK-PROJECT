<?php

namespace App\Http\Controllers\API\Public;

use App\Http\Controllers\Controller;
use App\Services\PublicFormSubmissionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    use ApiResponse;

    public function __construct(
        protected PublicFormSubmissionService $submissionService
    ) {
    }

    public function submit(Request $request)
    {   
        $request->validate([
            'form_id' => 'required|exists:forms,id',

            'company_name' => 'required|string|max:255',
            'business_email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:50',

            'answers' => 'required|array|min:1',

            'answers.*.question_id' => 'required|exists:form_questions,id',
            'answers.*.selected_option_id' =>
                'nullable|exists:question_options,id',
            'answers.*.answer_text' => 'nullable|string',
        ]);

        $submission = $this->submissionService->submit(
            $request->all()
        );

        return $this->success(
            $submission,
            'Form submitted successfully'
        );
    }
}