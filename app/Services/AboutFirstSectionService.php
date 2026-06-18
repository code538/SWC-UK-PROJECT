<?php

namespace App\Services;

use App\Models\AboutFirstSection;
use Illuminate\Http\Request;

class AboutFirstSectionService extends BaseService
{

    public function save(Request $request)
    {

        $section = AboutFirstSection::first();

        $data = $request->except('bg_image');


        if($request->hasFile('bg_image')){

            if($section?->bg_image){

                $this->deleteFile(
                    $section->bg_image
                );

            }

            $data['bg_image'] = $this->uploadFile(

                $request->file('bg_image'),

                'about-first-section'

            );

        }


        return AboutFirstSection::updateOrCreate(

            ['id'=>1],

            $data

        );

    }


    public function details()
    {

        $section = AboutFirstSection::first();


        if($section){

            $section->bg_image = $this->fileUrl(

                $section->bg_image

            );

        }


        return $section;

    }



}