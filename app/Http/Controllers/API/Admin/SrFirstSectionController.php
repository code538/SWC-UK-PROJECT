<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SrFirstSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SrFirstSectionController extends Controller
{
    use ApiResponse;

    protected SrFirstSectionService $srFirstSectionService;

    public function __construct(
        SrFirstSectionService $srFirstSectionService
    ) {
        $this->srFirstSectionService =
            $srFirstSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'highlighted_text' => 'nullable|string|max:255',
            'title_meta' => 'nullable|string|max:255',

            'description' => 'nullable|string',
            'desc_meta' => 'nullable|string',

            'title2' => 'nullable|string|max:255',
            'title3' => 'nullable|string|max:255',

            'feature' => 'nullable|string',

            'image_alt' => 'nullable|string|max:255',

            'web_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'mobile_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'status' => 'nullable|boolean',
        ]);

        $section = $this->srFirstSectionService
            ->save($request);

        return $this->success(
            $section,
            'SR first section saved successfully'
        );
    }

    public function details()
    {
        
        $section = $this->srFirstSectionService
            ->details();

        if (!$section) {

            return $this->error(
                'SR first section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'SR first section fetched successfully'
        );
    }
}