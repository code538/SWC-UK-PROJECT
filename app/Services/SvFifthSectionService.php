<?php

namespace App\Services;

use App\Models\SvFifthSection;
use Illuminate\Http\Request;

class SvFifthSectionService extends BaseService
{


    public function save(Request $request)
    {

        return SvFifthSection::updateOrCreate(

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




                'statistics'=>

                    $request->statistics,




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


        return SvFifthSection::find(

            $id

        );


    }




    public function list()
    {


        return SvFifthSection::

                latest()

                ->get();


    }





    public function delete($id)
    {


        $section = SvFifthSection::find(

                        $id

                    );



        if(!$section){

            return false;

        }




        return $section->delete();


    }




}