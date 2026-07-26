<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\FormQuestionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'question_type' => 'required|in:single_choice,multiple_choice,text,email,phone,textarea,select',
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

    public function update(Request $request, int $id)
    {
        $request->validate([
            'form_id' => 'required|exists:forms,id',
            'question_text' => 'required|string',
            'helper_text' => 'nullable|string',
            'question_type' => 'required|in:single_choice,multiple_choice,text,email,phone,textarea,select',

            'question_order' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('form_questions', 'question_order')
                    ->where('form_id', $request->form_id)
                    ->ignore($id),
            ],

            'is_required' => 'nullable|boolean',
        ]);

        $question = $this->questionService->update(
            $request,
            $id
        );

        return $this->success(
            $question,
            'Question updated successfully'
        );
    }

    public function delete(int $id)
    {
        $this->questionService->delete($id);

        return $this->success(
            [],
            'Question deleted successfully'
        );
    }
}