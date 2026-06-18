<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use ApiResponse;

    protected BannerService $bannerService;

    public function __construct(
        BannerService $bannerService
    ) {
        $this->bannerService = $bannerService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|max:255',

            'title' => 'nullable|string|max:255',
            'highlighted_title' => 'nullable|string|max:255',
            'title_meta' => 'nullable|string|max:255',

            'description' => 'nullable|string',
            'desc_meta' => 'nullable|string',

            'button1_text' => 'nullable|string|max:255',
            'button1_url' => 'nullable|string|max:255',

            'button2_text' => 'nullable|string|max:255',
            'button2_url' => 'nullable|string|max:255',

            'image_alt' => 'nullable|string|max:255',

            'video_meta' => 'nullable|string|max:255',

            'media_type' => 'required|in:image,video',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'video' => 'nullable|file|mimes:mp4,mov,avi,webm|max:51200',

            'status' => 'nullable|boolean',
        ]);

        $banner = $this->bannerService->save(
            $request
        );

        return $this->success(
            $banner,
            'Banner saved successfully'
        );
    }

    public function details($page)
    {
        $banner = $this->bannerService->details(
            $page
        );

        if (!$banner) {
            return $this->error(
                'Banner not found',
                [],
                404
            );
        }

        return $this->success(
            $banner,
            'Banner fetched successfully'
        );
    }

    public function list()
    {
        return $this->success(
            $this->bannerService->all(),
            'Banner list fetched successfully'
        );
    }
}