<?php

namespace App\Services;

use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingService extends BaseService
{
    public function save(Request $request)
    {
        $data = $request->except('og_image');

        if ($request->hasFile('og_image')) {

            $seo = SeoSetting::where(
                'page_name',
                $data['page_name']
            )->first();

            if ($seo?->og_image) {
                $this->deleteFile(
                    $seo->og_image
                );
            }

            $data['og_image'] = $this->uploadFile(
                $request->file('og_image'),
                'seo-settings'
            );
        }

        return SeoSetting::updateOrCreate(
            [
                'page_name' => $data['page_name']
            ],
            $data
        );
    }

    public function details(string $page)
    {
        $seo = SeoSetting::where(
            'page_name',
            $page
        )->first();

        if ($seo) {
            $seo->og_image = $this->fileUrl($seo->og_image);
        }

        return $seo;
    }
}