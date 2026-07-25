<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\SponsorshipFirstSection;

class SponsorshipFirstSectionService extends BaseService
{

    public function save(Request $request)
    {

        $section = SponsorshipFirstSection::first();

        $data = [

            'batch' => $request->batch,

            'title' => $request->title,

            'highlighted_title' => $request->highlighted_title,

            'description' => $request->description,

            'title_meta' => $request->title_meta,

            'desc_meta' => $request->desc_meta,

            'statistics' => $request->statistics,

            'certifications' => $request->certifications,

            'button_name' => $request->button_name,

            'button_url' => $request->button_url,

            'image_alt' => $request->image_alt,

            'card_badge' => $request->card_badge,

            'card_title' => $request->card_title,

            'card_description' => $request->card_description,

            'status' => $request->status ?? 1,

        ];


        if ($request->hasFile('web_image')) {

            if ($section?->web_image) {

                $this->deleteFile($section->web_image);

            }

            $data['web_image'] = $this->uploadFile(

                $request->file('web_image'),

                'sponsorship-first-section'

            );

        }



        if ($request->hasFile('mobile_image')) {

            if ($section?->mobile_image) {

                $this->deleteFile($section->mobile_image);

            }

            $data['mobile_image'] = $this->uploadFile(

                $request->file('mobile_image'),

                'sponsorship-first-section'

            );

        }


        return SponsorshipFirstSection::updateOrCreate(

            [

                'id' => 1

            ],

            $data

        );

    }



    public function details()
    {

        $section = SponsorshipFirstSection::first();

        if (!$section) {

            return null;

        }


        $section->web_image = $this->fileUrl(

            $section->web_image

        );


        $section->mobile_image = $this->fileUrl(

            $section->mobile_image

        );


        return $section;

    }

}