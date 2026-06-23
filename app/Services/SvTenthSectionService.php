<?php

namespace App\Services;

use App\Models\SvTenthSection;
use Illuminate\Http\Request;

class SvTenthSectionService extends BaseService
{


    public function save(Request $request)
    {


        return SvTenthSection::updateOrCreate(

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



                'title2'=>

                        $request->title2,


                'short_desc'=>

                        $request->short_desc,



                'challenge_title'=>

                        $request->challenge_title,


                'challenge_desc'=>

                        $request->challenge_desc,



                'strategy_title'=>

                        $request->strategy_title,


                'strategy_desc'=>

                        $request->strategy_desc,



                'services'=>

                        $request->services,



                'results'=>

                        $request->results,



                'testimonial_title'=>

                        $request->testimonial_title,



                'testimonial_desc'=>

                        $request->testimonial_desc,



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

        return SvTenthSection::find(

                    $id

                );

    }




    public function list()
    {

        return SvTenthSection::

                    latest()

                    ->get();

    }




    public function delete($id)
    {


        $section = SvTenthSection::find(

                        $id

                    );


        if(!$section){

            return false;

        }



        return $section->delete();



    }



}
