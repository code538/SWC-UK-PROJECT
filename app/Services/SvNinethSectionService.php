<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\SvNinethSection;

class SvNinethSectionService extends BaseService
{


    public function save(Request $request)
    {


        return SvNinethSection::updateOrCreate(

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



                'plans'=>

                        $request->plans,




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

        return SvNinethSection::find(

            $id

        );

    }




    public function list()
    {

        return SvNinethSection::

                    latest()

                    ->get();

    }




    public function delete($id)
    {


        $section = SvNinethSection::find(

                        $id

                    );


        if(!$section){

            return false;

        }


        return $section->delete();


    }



}
