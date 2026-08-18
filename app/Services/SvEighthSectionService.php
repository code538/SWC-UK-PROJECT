<?php

namespace App\Services;

use App\Models\SvEighthSection;
use Illuminate\Http\Request;

class SvEighthSectionService extends BaseService
{


    public function save(Request $request)
    {

        return SvEighthSection::updateOrCreate(

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




                'timelines'=>

                        $request->timelines,





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

        return SvEighthSection::find(

                    $id

                );

    }




    public function list()
    {

        return SvEighthSection::

                    latest()

                    ->get();

    }




    public function delete($id)
    {


        $section = SvEighthSection::find(

                        $id

                    );


        if(!$section){

            return false;

        }


        return $section->delete();

    }



}
