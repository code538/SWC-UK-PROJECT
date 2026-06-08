<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SeoSettingService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    use ApiResponse;

    protected SeoSettingService $seoSettingService;

    public function __construct(
        SeoSettingService $seoSettingService
    ) {
        $this->seoSettingService = $seoSettingService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|max:255',

            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',

            'canonical_url' => 'nullable|url',

            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',

            'status' => 'nullable|boolean',

            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $seoSetting = $this->seoSettingService->save($request);

        return $this->success(
            $seoSetting,
            'SEO settings saved successfully'
        );
    }

    public function details($page)
    {
        $seoSetting = $this->seoSettingService->details($page);

        if (!$seoSetting) {
            return $this->error(
                'SEO settings not found',
                [],
                404
            );
        }

        return $this->success(
            $seoSetting,
            'SEO settings fetched successfully'
        );
    }
}