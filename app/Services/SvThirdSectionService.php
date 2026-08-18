<?php

namespace App\Services;

use App\Models\SvThirdSection;
use Illuminate\Http\Request;

class SvThirdSectionService extends BaseService
{


    // public function save(Request $request)
    // {


    //     return SvThirdSection::updateOrCreate(

    //         [

    //             'id'=>$request->id

    //         ],

    //         [

    //             'batch'=>$request->batch,
    //             'identifier'=>$request->identifier,


    //             'title'=>$request->title,

    //             'highlighted_title'=>

    //                 $request->highlighted_title,


    //             'description'=>

    //                 $request->description,



    //             'title_meta'=>

    //                 $request->title_meta,


    //             'desc_meta'=>

    //                 $request->desc_meta,



    //             'card1_title'=>

    //                 $request->card1_title,


    //             'card2_title'=>

    //                 $request->card2_title,


    //             'card3_title'=>

    //                 $request->card3_title,


    //             'card4_title'=>

    //                 $request->card4_title,




    //             'title2'=>

    //                 $request->title2,


    //             'short_desc'=>

    //                 $request->short_desc,




    //             'button_name'=>

    //                 $request->button_name,


    //             'button_url'=>

    //                 $request->button_url,




    //             'status'=>

    //                 $request->status ?? 1


    //         ]

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


        // return SvThirdSection::find(

        //     $id

        // );

        $section = SvThirdSection::find($id);

        if($section)
        {
            $section->web_image = $this->fileUrl($section->web_image);
            $section->mobile_image = $this->fileUrl($section->mobile_image);
        }
        return $section;


    }





    public function list()
    {


        // return SvThirdSection::

        //         latest()

        //         ->get();

         $sections = SvThirdSection::

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


        $section = SvThirdSection::find(

                        $id

                    );



        if(!$section){

            return false;
        }



        return $section->delete();


    }



}
