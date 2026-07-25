<?php

namespace App\Services;

use App\Models\SponsorshipSecondSection;
use Illuminate\Http\Request;

class SponsorshipSecondSectionService extends BaseService
{

    public function save(Request $request)
    {

        $section = null;

        if ($request->id) {

            $section = SponsorshipSecondSection::find($request->id);

        }


        $data = [

            'title' => $request->title,

            'title_meta' => $request->title_meta,

            'description' => $request->description,

            'desc_meta' => $request->desc_meta,

            'steps' => $request->steps,

            'title2' => $request->title2,

            'title2_meta' => $request->title2_meta,

            'desc2' => $request->desc2,

            'desc2_meta' => $request->desc2_meta,

            'image_alt' => $request->image_alt,

            'status' => $request->status ?? 1,

        ];



        if ($request->hasFile('web_image')) {

            if ($section?->web_image) {

                $this->deleteFile($section->web_image);

            }

            $data['web_image'] = $this->uploadFile(

                $request->file('web_image'),

                'sponsorship-second-section'

            );

        }



        if ($request->hasFile('mobile_image')) {

            if ($section?->mobile_image) {

                $this->deleteFile($section->mobile_image);

            }

            $data['mobile_image'] = $this->uploadFile(

                $request->file('mobile_image'),

                'sponsorship-second-section'

            );

        }



        return SponsorshipSecondSection::updateOrCreate(

            [

                'id' => $request->id

            ],

            $data

        );

    }



    public function details($id)
    {

        $section = SponsorshipSecondSection::find($id);

        if (!$section) {

            return null;

        }

        $section->web_image = $this->fileUrl($section->web_image);

        $section->mobile_image = $this->fileUrl($section->mobile_image);

        return $section;

    }



    public function list()
    {

        $sections = SponsorshipSecondSection::

            latest()

            ->get();

        foreach ($sections as $section) {

            $section->web_image = $this->fileUrl($section->web_image);

            $section->mobile_image = $this->fileUrl($section->mobile_image);

        }

        return $sections;

    }



    public function delete($id)
    {

        $section = SponsorshipSecondSection::find($id);

        if (!$section) {

            return false;

        }


        if ($section->web_image) {

            $this->deleteFile($section->web_image);

        }

        if ($section->mobile_image) {

            $this->deleteFile($section->mobile_image);

        }

        return $section->delete();

    }

}