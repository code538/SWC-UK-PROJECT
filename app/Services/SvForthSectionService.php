<?php

namespace App\Services;

use App\Models\SvForthSection;
use Illuminate\Http\Request;

class SvForthSectionService extends BaseService
{


    public function save(Request $request)
    {

        return SvForthSection::updateOrCreate(

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




                'features'=>

                    $request->features,




                'title2'=>

                    $request->title2,



                'short_desc'=>

                    $request->short_desc,



                'status'=>

                    $request->status ?? 1


            ]

        );

    }



    public function details($id)
    {

        return SvForthSection::find(

            $id

        );

    }



    public function list()
    {

        return SvForthSection::

                    latest()

                    ->get();

    }




    public function delete($id)
    {


        $section = SvForthSection::find(

                        $id

                    );



        if(!$section){

            return false;

        }



        return $section->delete();


    }



}