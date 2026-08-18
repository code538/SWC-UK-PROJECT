<?php

namespace App\Services;

use App\Models\SvEleventhSection;
use Illuminate\Http\Request;

class SvEleventhSectionService extends BaseService
{


    public function save(Request $request)
    {


        return SvEleventhSection::updateOrCreate(

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




                'cards'=>

                    $request->cards,





                'status'=>

                    $request->status ?? 1




            ]

        );


    }




    public function details($id)
    {


        return SvEleventhSection::find(

            $id

        );


    }




    public function list()
    {


        return SvEleventhSection::

                    latest()

                    ->get();


    }





    public function delete($id)
    {


        $section = SvEleventhSection::find(

                        $id

                    );



        if(!$section){

            return false;

        }




        return $section->delete();


    }



}
