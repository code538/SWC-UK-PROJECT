<?php

namespace App\Services;

use App\Models\SubmissionAnswer;
use Illuminate\Http\Request;

class SubmissionAnswerService extends BaseService
{
    public function save(Request $request): SubmissionAnswer
    {
        $data = $request->only([
            'submission_id', 'question_id', 'selected_option_id', 'answer_text',
        ]);

        return SubmissionAnswer::updateOrCreate([
            'submission_id' => $request->submission_id,
            'question_id' => $request->question_id,
        ], $data);
    }

    public function all(int $submissionId)
    {
        return SubmissionAnswer::with(['question', 'selectedOption'])
            ->where('submission_id', $submissionId)
            ->get();
    }
}