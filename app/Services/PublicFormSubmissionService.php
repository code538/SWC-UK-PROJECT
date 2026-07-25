<?php

namespace App\Services;

use App\Models\Form;
use App\Models\FormSubmission;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PublicFormSubmissionService extends BaseService
{
    public function submit(array $data): FormSubmission
    {
        return DB::transaction(function () use ($data) {
            $form = Form::with('questions')->findOrFail(
                $data['form_id']
            );

            $questions = $form->questions->keyBy('id');

            foreach ($data['answers'] as $answer) {
                $question = $questions->get($answer['question_id']);

                // Question must belong to the submitted form.
                if (!$question) {
                    throw ValidationException::withMessages([
                        'answers' => ['A submitted question does not belong to this form.'],
                    ]);
                }

                // Selected option must belong to its question.
                if (!empty($answer['selected_option_id'])) {
                    $isValidOption = QuestionOption::where(
                        'id',
                        $answer['selected_option_id']
                    )->where(
                        'question_id',
                        $answer['question_id']
                    )->exists();

                    if (!$isValidOption) {
                        throw ValidationException::withMessages([
                            'answers' => ['An answer option does not belong to its question.'],
                        ]);
                    }
                }
            }

            $submission = FormSubmission::create([
                'form_id' => $form->id,
                'company_name' => $data['company_name'],
                'business_email' => $data['business_email'],
                'phone_number' => $data['phone_number'],
                'status' => 'completed',
                'submitted_at' => now(),
            ]);

            foreach ($data['answers'] as $answer) {
                $submission->answers()->create([
                    'question_id' => $answer['question_id'],
                    'selected_option_id' =>
                        $answer['selected_option_id'] ?? null,
                    'answer_text' => $answer['answer_text'] ?? null,
                ]);
            }

            return $submission->load([
                'form:id,name',
                'answers.question',
                'answers.selectedOption',
            ]);
        });
    }
}