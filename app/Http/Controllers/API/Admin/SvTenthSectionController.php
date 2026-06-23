<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SvTenthSectionService;

class SvTenthSectionController extends Controller
{

    use ApiResponse;



    protected SvTenthSectionService
                $svTenthSectionService;




    public function __construct(

        SvTenthSectionService
            $svTenthSectionService

    ){

        $this->svTenthSectionService =

                $svTenthSectionService;

    }





    public function save(Request $request)
    {


        $request->validate([


            'id'=>'nullable|integer',


            'services'=>'nullable|array',

            'results'=>'nullable|array',


            'status'=>'nullable|boolean'


        ]);





        $section =

            $this->svTenthSectionService

                ->save(

                    $request

                );





        return $this->success(

            $section,

            'Section saved successfully'

        );


    }




    public function details($id)
    {

        return $this->success(

            $this->svTenthSectionService

                ->details(

                    $id

                ),

            'Details fetched'

        );


    }




    public function list()
    {


        return $this->success(

            $this->svTenthSectionService

                ->list(),

            'List fetched'

        );


    }




    public function delete($id)
    {


        $this->svTenthSectionService

                ->delete(

                    $id

                );



        return $this->success(

            [],

            'Deleted successfully'

        );


    }



}
