<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SvThirdSectionService;

class SvThirdSectionController extends Controller
{

    use ApiResponse;


    protected SvThirdSectionService
                $svThirdSectionService;




    public function __construct(

        SvThirdSectionService
            $svThirdSectionService

    ){

        $this->svThirdSectionService =

                $svThirdSectionService;

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



            'card1_title'=>

                    'nullable|string',


            'card2_title'=>

                    'nullable|string',


            'card3_title'=>

                    'nullable|string',


            'card4_title'=>

                    'nullable|string',



            'title2'=>

                    'nullable|string',



            'short_desc'=>

                    'nullable|string',



            'button_name'=>

                    'nullable|string',



            'button_url'=>

                    'nullable|string',



            'status'=>

                    'nullable|boolean'


        ]);



        $section =

            $this->svThirdSectionService

                ->save(

                    $request

                );




        return $this->success(

            $section,

            'Saved successfully'

        );


    }





    public function details($id)
    {


        return $this->success(

            $this->svThirdSectionService

                ->details(

                    $id

                ),

            'Details fetched'

        );


    }





    public function list()
    {


        return $this->success(

            $this->svThirdSectionService

                ->list(),

            'List fetched'

        );


    }





    public function delete($id)
    {


        $this->svThirdSectionService

                ->delete(

                    $id

                );




        return $this->success(

            [],

            'Deleted successfully'

        );


    }



}