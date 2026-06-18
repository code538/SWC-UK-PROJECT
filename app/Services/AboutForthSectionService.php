<?php

namespace App\Services;

use App\Models\AboutForthSection;
use Illuminate\Http\Request;

class AboutForthSectionService extends BaseService
{


    public function save(Request $request)
    {

        $section = AboutForthSection::first();


        $data = $request->except([

            'web_image1',
            'mobile_image1',

            'web_image2',
            'mobile_image2'

        ]);


        if($request->hasFile('web_image1')){

            if($section?->web_image1){

                $this->deleteFile(
                    $section->web_image1
                );

            }

            $data['web_image1'] = $this->uploadFile(

                $request->file('web_image1'),

                'about-forth-section'

            );

        }



        if($request->hasFile('mobile_image1')){


            if($section?->mobile_image1){

                $this->deleteFile(

                    $section->mobile_image1

                );
            }


            $data['mobile_image1'] = $this->uploadFile(

                $request->file('mobile_image1'),

                'about-forth-section'

            );

        }




        if($request->hasFile('web_image2')){


            if($section?->web_image2){

                $this->deleteFile(

                    $section->web_image2

                );
            }


            $data['web_image2'] = $this->uploadFile(

                $request->file('web_image2'),

                'about-forth-section'

            );

        }




        if($request->hasFile('mobile_image2')){


            if($section?->mobile_image2){

                $this->deleteFile(

                    $section->mobile_image2

                );
            }


            $data['mobile_image2'] = $this->uploadFile(

                $request->file('mobile_image2'),

                'about-forth-section'

            );

        }



        return AboutForthSection::updateOrCreate(

            ['id'=>1],

            $data

        );


    }




    public function details()
    {

        $section = AboutForthSection::first();



        if($section){


            $section->web_image1 = $this->fileUrl(
                $section->web_image1
            );


            $section->mobile_image1 = $this->fileUrl(
                $section->mobile_image1
            );


            $section->web_image2 = $this->fileUrl(
                $section->web_image2
            );


            $section->mobile_image2 = $this->fileUrl(
                $section->mobile_image2
            );

        }


        return $section;


    }


}