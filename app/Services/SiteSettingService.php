<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingService extends BaseService
{
    public function save(Request $request)
    {
        $siteSetting = SiteSetting::first();

        $data = $request->except([
            'site_logo',
            'favicon'
        ]);

        if ($request->hasFile('site_logo')) {

            if ($siteSetting?->site_logo) {
                $this->deleteFile(
                    $siteSetting->site_logo
                );
            }

            $data['site_logo'] = $this->uploadFile(
                $request->file('site_logo'),
                'site-settings'
            );
        }

        if ($request->hasFile('favicon')) {

            if ($siteSetting?->favicon) {
                $this->deleteFile(
                    $siteSetting->favicon
                );
            }

            $data['favicon'] = $this->uploadFile(
                $request->file('favicon'),
                'site-settings'
            );
        }

        return SiteSetting::updateOrCreate(
            ['id' => 1],
            $data
        );
    }

    public function details()
    {
        $siteSetting = SiteSetting::first();

        if ($siteSetting) {

            $siteSetting->site_logo =
                $this->fileUrl(
                    $siteSetting->site_logo
                );

            $siteSetting->favicon =
                $this->fileUrl(
                    $siteSetting->favicon
                );
        }

        return $siteSetting;
    }
}