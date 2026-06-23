<?php

namespace App\Services;

use App\Models\SvTwelvethSection;
use Illuminate\Http\Request;

class SvTwelvethSectionService extends BaseService
{


    public function save(Request $request)
    {


        return SvTwelvethSection::updateOrCreate(

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



                'note'=>

                    $request->note,



                'cards'=>

                    $request->cards,



                'status'=>

                    $request->status ?? 1


            ]

        );


    }




    public function details($id)
    {

        return SvTwelvethSection::find(

            $id

        );

    }




    public function list()
    {


        return SvTwelvethSection::

                latest()

                ->get();


    }




    public function delete($id)
    {


        $section = SvTwelvethSection::find(

                        $id

                    );


        if(!$section){

            return false;

        }



        return $section->delete();


    }



}
