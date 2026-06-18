<?php

namespace App\Services;

use App\Models\SrFirstSection;
use Illuminate\Http\Request;

class SrFirstSectionService extends BaseService
{
    public function save(Request $request)
    {
        $section = SrFirstSection::first();

        $data = $request->except([
            'web_image',
            'mobile_image'
        ]);

        if ($request->hasFile('web_image')) {

            if ($section?->web_image) {
                $this->deleteFile(
                    $section->web_image
                );
            }

            $data['web_image'] = $this->uploadFile(
                $request->file('web_image'),
                'sr-first-section'
            );
        }

        if ($request->hasFile('mobile_image')) {

            if ($section?->mobile_image) {
                $this->deleteFile(
                    $section->mobile_image
                );
            }

            $data['mobile_image'] = $this->uploadFile(
                $request->file('mobile_image'),
                'sr-first-section'
            );
        }

        return SrFirstSection::updateOrCreate(
            ['id' => 1],
            $data
        );
    }

    public function details()
    {
        $section = SrFirstSection::first();

        if ($section) {

            $section->web_image =
                $this->fileUrl(
                    $section->web_image
                );

            $section->mobile_image =
                $this->fileUrl(
                    $section->mobile_image
                );
        }

        return $section;
    }
}