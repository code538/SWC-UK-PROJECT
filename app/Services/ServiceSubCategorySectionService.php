<?php

namespace App\Services;

use App\Models\ServiceSubCategorySection;
use DB;
use Illuminate\Http\Request;

class ServiceSubCategorySectionService
{


    public function save(Request $request)
    {


        return ServiceSubCategorySection::updateOrCreate(

            [

                'id'=>$request->id

            ],

            [

                'service_sub_category_id'=>

                        $request->service_sub_category_id,


                'section_name'=>

                        $request->section_name,


                'section_id'=>

                        $request->section_id,


                'order_by'=>

                        $request->order_by ?? 0,


                'status'=>

                        $request->status ?? 1


            ]

        );


    }



    public function details($id)
    {


        return ServiceSubCategorySection::with(

            'subcategory'

        )

        ->find($id);


    }




    public function list()
    {


        return ServiceSubCategorySection::with(

            'subcategory'

        )

        ->orderBy('order_by')

        ->get();



    }




    public function delete($id)
    {


        $section = ServiceSubCategorySection::find(

            $id

        );


        if(!$section){

            return false;

        }


        return $section->delete();


    }

    public function sectionList($section_name)
    {
        $section = $section_name.'_sections';
        return DB::table($section)
            ->where('status', 1)
            ->select(
                'id',
                'batch',
                'title',
                'highlighted_title'
            )
            ->get();
    }


}
