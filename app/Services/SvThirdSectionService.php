<?php

namespace App\Services;

use App\Models\SvThirdSection;
use Illuminate\Http\Request;

class SvThirdSectionService extends BaseService
{


    public function save(Request $request)
    {


        return SvThirdSection::updateOrCreate(

            [

                'id'=>$request->id

            ],

            [

                'batch'=>$request->batch,
                'identifier'=>$request->identifier,


                'title'=>$request->title,

                'highlighted_title'=>

                    $request->highlighted_title,


                'description'=>

                    $request->description,



                'title_meta'=>

                    $request->title_meta,


                'desc_meta'=>

                    $request->desc_meta,



                'card1_title'=>

                    $request->card1_title,


                'card2_title'=>

                    $request->card2_title,


                'card3_title'=>

                    $request->card3_title,


                'card4_title'=>

                    $request->card4_title,




                'title2'=>

                    $request->title2,


                'short_desc'=>

                    $request->short_desc,




                'button_name'=>

                    $request->button_name,


                'button_url'=>

                    $request->button_url,




                'status'=>

                    $request->status ?? 1


            ]

        );


    }




    public function details($id)
    {


        return SvThirdSection::find(

            $id

        );


    }





    public function list()
    {


        return SvThirdSection::

                latest()

                ->get();


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
