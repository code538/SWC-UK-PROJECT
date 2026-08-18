<?php

namespace App\Services;

use App\Models\SvFirstSection;
use Illuminate\Http\Request;

class SvFirstSectionService extends BaseService
{


    // public function save(Request $request)
    // {

    //     $section = SvFirstSection::find(
    //         $request->id
    //     );


    //     $data = $request->except([

    //         'web_image',
    //         'mobile_image'

    //     ]);


    //     if($request->hasFile('web_image'))
    //     {


    //         if($section?->web_image)
    //         {

    //             $this->deleteFile(

    //                 $section->web_image

    //             );

    //         }



    //         $data['web_image'] = $this->uploadFile(

    //             $request->file('web_image'),

    //             'sv-first-section'

    //         );



    //     }




    //     if($request->hasFile('mobile_image'))
    //     {


    //         if($section?->mobile_image)
    //         {

    //             $this->deleteFile(

    //                 $section->mobile_image

    //             );

    //         }



    //         $data['mobile_image'] = $this->uploadFile(

    //             $request->file('mobile_image'),

    //             'sv-first-section'

    //         );



    //     }




    //     return SvFirstSection::updateOrCreate(

    //         [

    //             'id'=>$request->id

    //         ],

    //         $data

    //     );


    // }

    public function save(Request $request)
    {
        $section = SvThirdSection::find(
            $request->id
        );

        $data = $request->except([
            'web_image',
            'mobile_image'
        ]);

        // Web Image
        if ($request->hasFile('web_image')) {

            if ($section?->web_image) {

                $this->deleteFile(
                    $section->web_image
                );
            }

            $data['web_image'] = $this->uploadFile(
                $request->file('web_image'),
                'sv-third-section'
            );
        }

        // Mobile Image
        if ($request->hasFile('mobile_image')) {

            if ($section?->mobile_image) {

                $this->deleteFile(
                    $section->mobile_image
                );
            }

            $data['mobile_image'] = $this->uploadFile(
                $request->file('mobile_image'),
                'sv-third-section'
            );
        }

        return SvThirdSection::updateOrCreate(
            [
                'id' => $request->id
            ],
            $data
        );
    }





    public function details($id)
    {

        $section = SvFirstSection::find($id);



        if($section)
        {


            $section->web_image = $this->fileUrl(

                $section->web_image

            );



            $section->mobile_image = $this->fileUrl(

                $section->mobile_image

            );


        }



        return $section;


    }




    public function list()
    {


        $sections = SvFirstSection::

                        latest()

                        ->get();




        foreach($sections as $section)
        {


            $section->web_image =

                $this->fileUrl(

                    $section->web_image

                );



            $section->mobile_image =

                $this->fileUrl(

                    $section->mobile_image

                );


        }




        return $sections;


    }




    public function delete($id)
    {


        $section = SvFirstSection::find(

            $id

        );


        if(!$section){

            return false;
        }



        if($section->web_image){

            $this->deleteFile(

                $section->web_image

            );

        }



        if($section->mobile_image){

            $this->deleteFile(

                $section->mobile_image

            );

        }



        return $section->delete();


    }




}