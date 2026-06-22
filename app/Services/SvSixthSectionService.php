<?php

namespace App\Services;

use App\Models\SvSixthSection;
use Illuminate\Http\Request;

class SvSixthSectionService extends BaseService
{


    public function save(Request $request)
    {

        return SvSixthSection::updateOrCreate(

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




                'services'=>

                    $request->services,





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

        return SvSixthSection::find(

            $id

        );

    }




    public function list()
    {

        return SvSixthSection::

                    latest()

                    ->get();

    }





    public function delete($id)
    {

        $section = SvSixthSection::find(

                        $id

                    );


        if(!$section){

            return false;

        }



        return $section->delete();

    }



}