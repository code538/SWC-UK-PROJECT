<?php

namespace App\Services;

use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormSubmissionService extends BaseService
{
    public function save(Request $request): FormSubmission
    {
        $data = $request->only([
            'form_id', 'company_name', 'business_email', 'phone_number', 'status',
        ]);

        if ($request->status === 'completed' && !$request->id) {
            $data['submitted_at'] = now();
        }

        if ($request->status === 'completed' && $request->id) {
            $data['submitted_at'] = FormSubmission::find($request->id)?->submitted_at ?? now();
        }

        return FormSubmission::updateOrCreate(['id' => $request->id], $data);
    }

    public function details(int $id): ?FormSubmission
    {
        return FormSubmission::with([
            'form.questions.options', 'answers.question', 'answers.selectedOption',
        ])->find($id);
    }

    public function all()
    {
        return FormSubmission::with('form:id,name')->latest()->get();
    }
}