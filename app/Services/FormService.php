<?php

namespace App\Services;

use App\Models\Form;
use Illuminate\Http\Request;

class FormService extends BaseService
{
    public function save(Request $request): Form
    {
        $data = $request->only(['name', 'description', 'form_type', 'is_active']);

        return Form::updateOrCreate(['id' => $request->id], $data);
    }

    public function details(int $id): ?Form
    {
        return Form::with('questions.options')->find($id);
    }

    public function all()
    {
        return Form::withCount('questions')->latest()->get();
    }
}