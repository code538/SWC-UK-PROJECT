<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SrSecondSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SrSecondSectionController extends Controller
{
    use ApiResponse;

    protected SrSecondSectionService $srSecondSectionService;

    public function __construct(
        SrSecondSectionService $srSecondSectionService
    ) {
        $this->srSecondSectionService =
            $srSecondSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'batch' => 'nullable|string|max:255',

            'title' => 'nullable|string|max:255',
            'title_meta' => 'nullable|string|max:255',

            'description' => 'nullable|string',
            'desc_meta' => 'nullable|string',

            'image1_alt' => 'nullable|string|max:255',
            'image2_alt' => 'nullable|string|max:255',
            'image3_alt' => 'nullable|string|max:255',

            'features' => 'nullable|string',

            'image1' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'image2' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'image3' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'status' => 'nullable|boolean',
        ]);

        $section = $this->srSecondSectionService
            ->save($request);

        return $this->success(
            $section,
            'SR second section saved successfully'
        );
    }

    public function details()
    {
        $section = $this->srSecondSectionService
            ->details();

        if (!$section) {

            return $this->error(
                'SR second section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'SR second section fetched successfully'
        );
    }
}