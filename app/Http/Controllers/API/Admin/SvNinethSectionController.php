<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SvNinethSectionService;

class SvNinethSectionController extends Controller
{

    use ApiResponse;


    protected SvNinethSectionService
                $svNinethSectionService;



    public function __construct(

        SvNinethSectionService
            $svNinethSectionService

    ){

        $this->svNinethSectionService=

                $svNinethSectionService;

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



            'plans'=>

                    'nullable|array',



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

            $this->svNinethSectionService

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

            $this->svNinethSectionService

                ->details(

                    $id

                ),

            'Details fetched'

        );


    }




    public function list()
    {


        return $this->success(

            $this->svNinethSectionService

                ->list(),

            'List fetched'

        );


    }




    public function delete($id)
    {


        $this->svNinethSectionService

                ->delete(

                    $id

                );


        return $this->success(

            [],

            'Deleted successfully'

        );


    }


}
