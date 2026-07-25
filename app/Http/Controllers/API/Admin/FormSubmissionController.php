<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\FormSubmissionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    use ApiResponse;

    public function __construct(protected FormSubmissionService $submissionService) {}

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:form_submissions,id',
            'form_id' => 'required|exists:forms,id',
            'company_name' => 'nullable|string|max:255',
            'business_email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:50',
            'status' => 'nullable|in:in_progress,completed',
        ]);

        return $this->success($this->submissionService->save($request), 'Submission saved successfully');
    }

    public function details(int $id)
    {
        $submission = $this->submissionService->details($id);
        return $submission ? $this->success($submission, 'Submission fetched successfully') : $this->error('Submission not found', [], 404);
    }

    public function list()
    {
        return $this->success($this->submissionService->all(), 'Submission list fetched successfully');
    }
}