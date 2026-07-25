<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\FormQuestionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FormQuestionController extends Controller
{
    use ApiResponse;

    public function __construct(protected FormQuestionService $questionService) {}

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:form_questions,id',
            'form_id' => 'required|exists:forms,id',
            'question_text' => 'required|string',
            'helper_text' => 'nullable|string',
            'question_type' => 'required|in:single_choice,multiple_choice,text,email,phone,textarea',
            'question_order' => 'required|integer|min:1',
            'is_required' => 'nullable|boolean',
        ]);

        return $this->success($this->questionService->save($request), 'Question saved successfully');
    }

    public function details(int $id)
    {
        $question = $this->questionService->details($id);
        return $question ? $this->success($question, 'Question fetched successfully') : $this->error('Question not found', [], 404);
    }

    public function list(int $formId)
    {
        return $this->success($this->questionService->all($formId), 'Question list fetched successfully');
    }
}