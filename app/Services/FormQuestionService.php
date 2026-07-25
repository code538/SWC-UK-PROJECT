<?php

namespace App\Services;

use App\Models\FormQuestion;
use Illuminate\Http\Request;

class FormQuestionService extends BaseService
{
    public function save(Request $request): FormQuestion
    {
        $data = $request->only([
            'form_id', 'question_text', 'helper_text', 'question_type',
            'question_order', 'is_required',
        ]);

        return FormQuestion::updateOrCreate(['id' => $request->id], $data);
    }

    public function details(int $id): ?FormQuestion
    {
        return FormQuestion::with('options')->find($id);
    }

    public function all(int $formId)
    {
        return FormQuestion::with('options')
            ->where('form_id', $formId)
            ->orderBy('question_order')
            ->get();
    }
}