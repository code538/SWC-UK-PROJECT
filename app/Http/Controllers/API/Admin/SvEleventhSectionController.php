<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SvEleventhSectionService;

class SvEleventhSectionController extends Controller
{

    use ApiResponse;



    protected SvEleventhSectionService
                $svEleventhSectionService;




    public function __construct(

        SvEleventhSectionService
            $svEleventhSectionService

    ){

        $this->svEleventhSectionService =

                $svEleventhSectionService;

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



            'cards'=>

                    'nullable|array',



            'status'=>

                    'nullable|boolean'



        ]);





        $section =

            $this->svEleventhSectionService

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

            $this->svEleventhSectionService

                ->details(

                    $id

                ),

            'Details fetched'

        );


    }




    public function list()
    {


        return $this->success(

            $this->svEleventhSectionService

                ->list(),

            'List fetched'

        );


    }




    public function delete($id)
    {


        $this->svEleventhSectionService

                ->delete(

                    $id

                );



        return $this->success(

            [],

            'Deleted successfully'

        );


    }



}
