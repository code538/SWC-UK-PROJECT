<?php

namespace App\Services;

use App\Models\QuestionOption;
use Illuminate\Http\Request;

class QuestionOptionService extends BaseService
{
    public function save(Request $request): QuestionOption
    {
        $data = $request->only(['question_id', 'option_text', 'option_order', 'score_value']);

        return QuestionOption::updateOrCreate(['id' => $request->id], $data);
    }

    public function details(int $id): ?QuestionOption
    {
        return QuestionOption::find($id);
    }

    public function all(int $questionId)
    {
        return QuestionOption::where('question_id', $questionId)
            ->orderBy('option_order')
            ->get();
    }
}