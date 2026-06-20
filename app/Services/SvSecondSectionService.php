<?php

namespace App\Services;

use App\Models\SvSecondSection;
use Illuminate\Http\Request;

class SvSecondSectionService extends BaseService
{


    public function save(Request $request)
    {


        return SvSecondSection::updateOrCreate(

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



                'feature'=>

                    $request->feature,



                'tag_line'=>

                    $request->tag_line,



                'status'=>

                    $request->status ?? 1


            ]

        );



    }





    public function details($id)
    {

        return SvSecondSection::find(

            $id

        );

    }




    public function list()
    {


        return SvSecondSection::

                    latest()

                    ->get();

    }




    public function delete($id)
    {

        $section = SvSecondSection::find(

                        $id

                    );


        if(!$section){

            return false;

        }


        return $section->delete();

    }




}
