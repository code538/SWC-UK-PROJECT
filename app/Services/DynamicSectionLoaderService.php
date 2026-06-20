<?php

namespace App\Services;

use App\Models\ServiceSubCategorySection;

class DynamicSectionLoaderService
{


    // public function loadSections($subcategoryId)
    // {

    //     $sections = ServiceSubCategorySection::where(

    //                     'service_sub_category_id',

    //                     $subcategoryId

    //                 )

    //                 ->where(

    //                     'status',

    //                     1

    //                 )

    //                 ->orderBy(

    //                     'order_by'

    //                 )

    //                 ->get();

    //     //dd($sections);
    //     $response = [];




    //     foreach($sections as $section)
    //     {


    //         $serviceClass = config(

    //             'service-sections.'.

    //             $section->section_name.

    //             '.service'

    //         );



    //         if(!$serviceClass){

    //             continue;

    //         }



    //         $service = app(

    //             $serviceClass

    //         );




    //         $data = $service->details();





    //         $response[]=[


    //             'section_name'=>

    //                     $section->section_name,


    //             'section_id'=>

    //                     $section->section_id,


    //             'data'=>

    //                     $data


    //         ];



    //     }



    //     return $response;


    // }

    public function loadSections($subcategoryId)
    {

        $sections = ServiceSubCategorySection::where(

                        'service_sub_category_id',

                        $subcategoryId

                    )
                    ->where('status',1)
                    ->orderBy('order_by')
                    ->get();


        $response=[];



        foreach($sections as $section)
        {


            $serviceClass = config(

                'service-sections.'

                .$section->section_name

                .'.service'

            );



            if(!$serviceClass){

                continue;

            }



            $service = app(

                $serviceClass

            );



            // ******** THIS IS IMPORTANT ********

            $data = $service->details(

                        $section->section_id

                    );




            $response[]=[


                'section_name'

                        =>$section->section_name,


                'section_id'

                        =>$section->section_id,


                'data'

                        =>$data



            ];



        }




        return $response;



    }


}