<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\QuestionOptionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionOptionController extends Controller
{
    use ApiResponse;

    public function __construct(protected QuestionOptionService $optionService) {}

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:question_options,id',
            'question_id' => 'required|exists:form_questions,id',
            'option_text' => 'required|string|max:500',
            'option_order' => 'required|integer|min:1',
            'score_value' => 'nullable|integer',
        ]);

        return $this->success($this->optionService->save($request), 'Option saved successfully');
    }

    public function details(int $id)
    {
        $option = $this->optionService->details($id);
        return $option ? $this->success($option, 'Option fetched successfully') : $this->error('Option not found', [], 404);
    }

    public function list(int $questionId)
    {
        return $this->success($this->optionService->all($questionId), 'Option list fetched successfully');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'question_id' => 'required|exists:form_questions,id',
            'option_text' => 'required|string|max:500',

            'option_order' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('question_options', 'option_order')
                    ->where('question_id', $request->question_id)
                    ->ignore($id),
            ],

            'score_value' => 'nullable|integer',
        ]);

        $option = $this->optionService->update(
            $request,
            $id
        );

        return $this->success(
            $option,
            'Option updated successfully'
        );
    }

    public function delete(int $id)
    {
        $this->optionService->delete($id);

        return $this->success(
            [],
            'Option deleted successfully'
        );
    }
}