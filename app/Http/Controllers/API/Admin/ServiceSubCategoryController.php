<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;

use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;

use App\Services\ServiceSubCategoryService;

class ServiceSubCategoryController extends Controller
{

    use ApiResponse;



    protected ServiceSubCategoryService
                $serviceSubCategoryService;




    public function __construct(

        ServiceSubCategoryService
            $serviceSubCategoryService

    ){


        $this->serviceSubCategoryService =

            $serviceSubCategoryService;


    }





    public function save(Request $request)
    {


        $request->validate([


            'id'
                =>'nullable|integer',


            'service_category_id'

                =>'required|exists:service_categories,id',



            'name'

                =>'required|string|max:255',



            'slug'

                =>'nullable|string|max:255',



            'order'

                =>'nullable|integer',



            'status'

                =>'nullable|boolean'



        ]);




        $subcategory = $this
                    ->serviceSubCategoryService
                    ->save($request);




        return $this->success(

            $subcategory,

            'Sub category saved successfully'

        );



    }






    public function details($id)
    {


        $subcategory = $this
                        ->serviceSubCategoryService
                        ->details($id);



        if(!$subcategory){


            return $this->error(

                'Sub category not found',

                [],

                404

            );


        }



        return $this->success(

            $subcategory,

            'Sub category fetched successfully'

        );



    }





    public function list()
    {


        return $this->success(

            $this->serviceSubCategoryService
                    ->list(),

            'Sub category list fetched successfully'

        );


    }






    public function delete($id)
    {



        $deleted = $this
                    ->serviceSubCategoryService
                    ->delete($id);



        if(!$deleted){

            return $this->error(

                'Sub category not found',

                [],

                404

            );

        }



        return $this->success(

            [],

            'Sub category deleted successfully'

        );



    }


}