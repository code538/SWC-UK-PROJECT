<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\ServiceCategoryService;

class ServiceCategoryController extends Controller
{

    use ApiResponse;


    protected ServiceCategoryService $serviceCategoryService;


    public function __construct(

        ServiceCategoryService $serviceCategoryService

    ){

        $this->serviceCategoryService =
            $serviceCategoryService;

    }




    public function save(Request $request)
    {

        $request->validate([

            'id'=>'nullable|integer',

            'name'=>'required|string|max:255',

            'description' => 'string|nullable',

            'slug'=>'nullable|string|max:255',

            'order'=>'nullable|integer',

            'status'=>'nullable|boolean'

        ]);


        $category = $this->serviceCategoryService
                        ->save($request);



        return $this->success(

            $category,

            'Service category saved successfully'

        );

    }




    public function details($id)
    {

        $category = $this->serviceCategoryService
                        ->details($id);



        if(!$category){

            return $this->error(

                'Category not found',

                [],

                404

            );

        }


        return $this->success(

            $category,

            'Category fetched successfully'

        );

    }




    public function list()
    {

        return $this->success(

            $this->serviceCategoryService
                ->adminList(),

            'Category list fetched successfully'

        );

    }




    public function delete($id)
    {


        $deleted = $this->serviceCategoryService
                    ->delete($id);


        if(!$deleted){

            return $this->error(

                'Category not found',

                [],

                404

            );

        }


        return $this->success(

            [],

            'Category deleted successfully'

        );


    }


}