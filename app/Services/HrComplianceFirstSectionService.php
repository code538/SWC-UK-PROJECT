<?php

namespace App\Services;

use App\Models\HrComplianceFirstSection;
use Illuminate\Http\Request;

class HrComplianceFirstSectionService extends BaseService
{

    public function save(Request $request)
    {

        $section = HrComplianceFirstSection::first();

        $data = [

            'batch' => $request->batch,

            'title' => $request->title,

            'highlighted_text' => $request->highlighted_text,

            'title_meta' => $request->title_meta,

            'description' => $request->description,

            'desc_meta' => $request->desc_meta,

            'image_alt' => $request->image_alt,

            'status' => $request->status ?? 1,

        ];


        if ($request->hasFile('bg_web_image')) {

            if ($section?->bg_web_image) {

                $this->deleteFile(
                    $section->bg_web_image
                );
            }

            $data['bg_web_image'] = $this->uploadFile(

                $request->file('bg_web_image'),

                'hr-compliance-first-section'

            );
        }



        if ($request->hasFile('bg_mobile_image')) {

            if ($section?->bg_mobile_image) {

                $this->deleteFile(
                    $section->bg_mobile_image
                );
            }

            $data['bg_mobile_image'] = $this->uploadFile(

                $request->file('bg_mobile_image'),

                'hr-compliance-first-section'

            );
        }



        return HrComplianceFirstSection::updateOrCreate(

            [

                'id' => 1

            ],

            $data

        );

    }



    public function details()
    {

        $section = HrComplianceFirstSection::first();

        if (!$section) {

            return null;

        }


        $section->bg_web_image = $this->fileUrl(

            $section->bg_web_image

        );


        $section->bg_mobile_image = $this->fileUrl(

            $section->bg_mobile_image

        );


        return $section;

    }

}