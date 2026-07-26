<?php

namespace App\Services;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormService extends BaseService
{
    // public function save(Request $request): Form
    // {
    //     $data = $request->only(['name', 'description', 'form_type', 'is_active']);

    //     return Form::updateOrCreate(['id' => $request->id], $data);
    // }

    public function save(Request $request): Form
    {
        $data = $request->only([
            'name',
            'description',
            'form_type',
            'is_active',
        ]);

        // Update: retain the current unique ID/public link.
        if ($request->filled('id')) {
            $form = Form::findOrFail($request->id);

            $form->update($data);

            return $form->fresh();
        }

        // Create: generate form-name + random code.
        $data['unique_id'] = $this->generateUniqueId(
            $request->name
        );

        return Form::create($data);
    }

    private function generateUniqueId(string $name): string
    {
        $slug = Str::limit(
            Str::slug($name),
            220,
            ''
        );

        $slug = $slug ?: 'form';

        do {
            $uniqueId = $slug . '-' . Str::upper(
                Str::random(6)
            );
        } while (Form::where('unique_id', $uniqueId)->exists());

        return $uniqueId;
    }

    public function details(int $id): ?Form
    {
        return Form::with('questions.options')->find($id);
    }

    public function all()
    {
        return Form::withCount('questions')->latest()->get();
    }

    public function update(Request $request, int $id): Form
    {
        $form = Form::findOrFail($id);

        $form->update(
            $request->only([
                'name',
                'description',
                'form_type',
                'is_active',
            ])
        );

        return $form->fresh();
    }
}