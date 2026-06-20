<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\BlogFirstSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BlogFirstSectionController extends Controller
{
    use ApiResponse;

    protected BlogFirstSectionService $blogFirstSectionService;

    public function __construct(
        BlogFirstSectionService $blogFirstSectionService
    ) {
        $this->blogFirstSectionService =
            $blogFirstSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'batch' => 'nullable|string|max:255',

            'title' => 'nullable|string|max:255',
            'highlighted_title' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'title_meta' => 'nullable|string|max:255',
            'desc_meta' => 'nullable|string',

            'web_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',

            'status' => 'nullable|boolean',
        ]);

        $section = $this->blogFirstSectionService
            ->save($request);

        return $this->success(
            $section,
            'Blog first section saved successfully'
        );
    }

    public function details()
    {
        $section = $this->blogFirstSectionService
            ->details();

        if (!$section) {

            return $this->error(
                'Blog first section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'Blog first section fetched successfully'
        );
    }
}