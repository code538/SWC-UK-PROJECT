<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\BlogSecondSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BlogSecondSectionController extends Controller
{
    use ApiResponse;

    protected BlogSecondSectionService $blogSecondSectionService;

    public function __construct(
        BlogSecondSectionService $blogSecondSectionService
    ) {
        $this->blogSecondSectionService =
            $blogSecondSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer',

            'title' => 'required|string|max:255',

            'category' => 'nullable|string|max:255',

            'long_desc' => 'nullable|string',

            'desc_meta' => 'nullable|string',

            'date' => 'nullable|date',

            'popular' => 'nullable|boolean',

            'last_read' => 'nullable|integer',

            'social_title' => 'nullable|string|max:255',

            'social_desc' => 'nullable|string',

            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',

            'image_alt' => 'nullable|string|max:255',

            'web_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'mobile_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'status' => 'nullable|boolean',
        ]);

        $blog = $this->blogSecondSectionService
            ->save($request);

        return $this->success(
            $blog,
            'Blog saved successfully'
        );
    }

    public function details($id)
    {
        $blog = $this->blogSecondSectionService
            ->details($id);

        if (!$blog) {

            return $this->error(
                'Blog not found',
                [],
                404
            );
        }

        return $this->success(
            $blog,
            'Blog fetched successfully'
        );
    }

    public function list()
    {
        return $this->success(
            $this->blogSecondSectionService->list(),
            'Blog list fetched successfully'
        );
    }

    public function delete($id)
    {
        $deleted = $this->blogSecondSectionService
            ->delete($id);

        if (!$deleted) {

            return $this->error(
                'Blog not found',
                [],
                404
            );
        }

        return $this->success(
            [],
            'Blog deleted successfully'
        );
    }

    // Fetch all blogs for public API
    public function allBlogs()
    {
        $data = $this->blogSecondSectionService
            ->allBlogs();

        return $this->success(
            $data,
            'Blogs fetched successfully'
        );
    }

    public function detailsBySlug($slug)
    {
        $blog = $this->blogSecondSectionService
            ->detailsBySlug($slug);

        if (!$blog) {

            return $this->error(
                'Blog not found',
                [],
                404
            );
        }

        return $this->success(
            $blog,
            'Blog fetched successfully'
        );
    }
}