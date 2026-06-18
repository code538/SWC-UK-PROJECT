<?php

namespace App\Services;

use App\Models\SrSecondSection;
use Illuminate\Http\Request;

class SrSecondSectionService extends BaseService
{
    public function save(Request $request)
    {
        $section = SrSecondSection::first();

        $data = $request->except([
            'image1',
            'image2',
            'image3'
        ]);

        if ($request->hasFile('image1')) {

            if ($section?->image1) {
                $this->deleteFile(
                    $section->image1
                );
            }

            $data['image1'] = $this->uploadFile(
                $request->file('image1'),
                'sr-second-section'
            );
        }

        if ($request->hasFile('image2')) {

            if ($section?->image2) {
                $this->deleteFile(
                    $section->image2
                );
            }

            $data['image2'] = $this->uploadFile(
                $request->file('image2'),
                'sr-second-section'
            );
        }

        if ($request->hasFile('image3')) {

            if ($section?->image3) {
                $this->deleteFile(
                    $section->image3
                );
            }

            $data['image3'] = $this->uploadFile(
                $request->file('image3'),
                'sr-second-section'
            );
        }

        return SrSecondSection::updateOrCreate(
            ['id' => 1],
            $data
        );
    }

    public function details()
    {
        $section = SrSecondSection::first();

        if ($section) {

            $section->image1 = $this->fileUrl(
                $section->image1
            );

            $section->image2 = $this->fileUrl(
                $section->image2
            );

            $section->image3 = $this->fileUrl(
                $section->image3
            );
        }

        return $section;
    }
}