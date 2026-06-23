<?php

namespace App\Services;

use App\Models\SvSeventhSection;
use Illuminate\Http\Request;

class SvSeventhSectionService extends BaseService
{


    public function save(Request $request)
    {


        return SvSeventhSection::updateOrCreate(

            [

                'id'=>$request->id

            ],

            [


                'batch'=>$request->batch,



                'title'=>$request->title,



                'highlighted_title'=>

                    $request->highlighted_title,




                'description'=>

                    $request->description,




                'title_meta'=>

                    $request->title_meta,




                'desc_meta'=>

                    $request->desc_meta,





                'steps'=>

                    $request->steps,





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


        return SvSeventhSection::find(

                    $id

                );


    }





    public function list()
    {


        return SvSeventhSection::

                latest()

                ->get();


    }





    public function delete($id)
    {



        $section = SvSeventhSection::find(

                        $id

                    );



        if(!$section){

            return false;

        }




        return $section->delete();



    }



}
