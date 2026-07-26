<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\FormService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FormController extends Controller
{
    use ApiResponse;

    public function __construct(protected FormService $formService) {}

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:forms,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'form_type' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        return $this->success($this->formService->save($request), 'Form saved successfully');
    }

    public function details(int $id)
    {
        $form = $this->formService->details($id);
        return $form ? $this->success($form, 'Form fetched successfully') : $this->error('Form not found', [], 404);
    }

    public function list()
    {
        return $this->success($this->formService->all(), 'Form list fetched successfully');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'form_type' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        $form = $this->formService->update(
            $request,
            $id
        );

        return $this->success(
            $form,
            'Form updated successfully'
        );
    }


}