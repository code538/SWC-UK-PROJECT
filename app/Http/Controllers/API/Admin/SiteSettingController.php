<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SiteSettingService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    use ApiResponse;

    protected SiteSettingService $siteSettingService;

    public function __construct(
        SiteSettingService $siteSettingService
    ) {
        $this->siteSettingService = $siteSettingService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'copyright_text' => 'nullable|string',
            'status' => 'nullable|boolean',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'whatsapp_url' => 'nullable|url',
            'site_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,ico,webp|max:1024',
        ]);

        $siteSetting = $this->siteSettingService->save($request);

        return $this->success(
            $siteSetting,
            'Site settings saved successfully'
        );
    }

    public function details()
    {
        $siteSetting = $this->siteSettingService->details();

        if (!$siteSetting) {
            return $this->error(
                'Site settings not found',
                [],
                404
            );
        }

        return $this->success(
            $siteSetting,
            'Site settings fetched successfully'
        );
    }

   
}