<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;

use App\Services\ServiceSubCategorySectionService;

class ServiceSubCategorySectionController extends Controller
{

    use ApiResponse;



    protected ServiceSubCategorySectionService
                $serviceSubCategorySectionService;




    public function __construct(

        ServiceSubCategorySectionService
            $serviceSubCategorySectionService

    ){

        $this->serviceSubCategorySectionService=

            $serviceSubCategorySectionService;


    }





    public function save(Request $request)
    {


        $request->validate([


            'id'

                =>'nullable|integer',


            'service_sub_category_id'

                =>'required|exists:service_sub_categories,id',



            'section_name'

                =>'required|string',



            'section_id'

                =>'required|integer',



            'order_by'

                =>'nullable|integer',



            'status'

                =>'nullable|boolean'



        ]);





        $section = $this
                    ->serviceSubCategorySectionService
                    ->save($request);




        return $this->success(

            $section,

            'Section saved successfully'

        );


    }





    public function details($id)
    {


        $section = $this
                    ->serviceSubCategorySectionService
                    ->details($id);



        if(!$section){

            return $this->error(

                'Section not found',

                [],

                404

            );

        }



        return $this->success(

            $section,

            'Section fetched successfully'

        );


    }





    public function list()
    {



        return $this->success(

            $this->serviceSubCategorySectionService
                    ->list(),

            'Section list fetched successfully'

        );


    }






    public function delete($id)
    {



        $deleted = $this
                    ->serviceSubCategorySectionService
                    ->delete($id);



        if(!$deleted){

            return $this->error(

                'Section not found',

                [],

                404

            );

        }



        return $this->success(

            [],

            'Section deleted successfully'

        );


    }

    public function sectionList($section_name)
    {
        $sectionList = $this->serviceSubCategorySectionService->sectionList($section_name);

        return $this->success(

            $sectionList,

            'Section list fetched successfully'

        );
    }

    

  




}
