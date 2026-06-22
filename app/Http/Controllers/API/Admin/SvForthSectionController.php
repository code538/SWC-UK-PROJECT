<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SvForthSectionService;

class SvForthSectionController extends Controller
{

    use ApiResponse;



    protected SvForthSectionService
                $svForthSectionService;




    public function __construct(

        SvForthSectionService
            $svForthSectionService

    ){

        $this->svForthSectionService =

                $svForthSectionService;

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



            'title2'=>

                    'nullable|string',



            'short_desc'=>

                    'nullable|string',



            'status'=>

                    'nullable|boolean'


        ]);




        $section =

        $this->svForthSectionService

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

            $this->svForthSectionService

                ->details(

                    $id

                ),

            'Details fetched'

        );

    }




    public function list()
    {

        return $this->success(

            $this->svForthSectionService

                ->list(),

            'List fetched'

        );

    }




    public function delete($id)
    {


        $this->svForthSectionService

                ->delete(

                    $id

                );



        return $this->success(

            [],

            'Deleted successfully'

        );



    }


}