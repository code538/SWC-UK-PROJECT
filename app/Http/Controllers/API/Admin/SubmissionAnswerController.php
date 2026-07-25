<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SubmissionAnswerService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubmissionAnswerController extends Controller
{
    use ApiResponse;

    public function __construct(protected SubmissionAnswerService $answerService) {}

    public function save(Request $request)
    {
        $request->validate([
            'submission_id' => 'required|exists:form_submissions,id',
            'question_id' => 'required|exists:form_questions,id',
            'selected_option_id' => [
                'nullable',
                Rule::exists('question_options', 'id')
                    ->where('question_id', $request->question_id),
            ],
            'answer_text' => 'nullable|string',
        ]);

        $answer = $this->answerService->save($request);
        return $this->success($answer, 'Answer saved successfully');
    }

    public function list(int $submissionId)
    {
        return $this->success($this->answerService->all($submissionId), 'Answer list fetched successfully');
    }
}