<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SvFifthSectionService;

class SvFifthSectionController extends Controller
{

    use ApiResponse;


    protected SvFifthSectionService
                $svFifthSectionService;



    public function __construct(

        SvFifthSectionService
            $svFifthSectionService

    ){

        $this->svFifthSectionService =

                $svFifthSectionService;

    }





    public function save(Request $request)
    {


        $request->validate([


            'id'=>'nullable|integer',

            'batch'=>'nullable|string',


            'title'=>'nullable|string',

            'highlighted_title'=>

                    'nullable|string',



            'description'=>

                    'nullable|string',



            'title_meta'=>

                    'nullable|string',



            'desc_meta'=>

                    'nullable|string',




            'features'=>

                    'nullable|array',




            'statistics'=>

                    'nullable|array',




            'title2'=>

                    'nullable|string',



            'short_desc'=>

                    'nullable|string',



            'status'=>

                    'nullable|boolean'



        ]);





        $section =

            $this->svFifthSectionService

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

            $this->svFifthSectionService

                ->details(

                    $id

                ),

            'Details fetched'

        );


    }




    public function list()
    {



        return $this->success(

            $this->svFifthSectionService

                ->list(),

            'List fetched'

        );


    }




    public function delete($id)
    {


        $this->svFifthSectionService

                ->delete(

                    $id

                );




        return $this->success(

            [],

            'Deleted successfully'

        );


    }



}
