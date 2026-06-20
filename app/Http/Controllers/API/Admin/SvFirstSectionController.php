<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SvFirstSectionService;

class SvFirstSectionController extends Controller
{

    use ApiResponse;



    protected SvFirstSectionService
                $svFirstSectionService;



    public function __construct(

        SvFirstSectionService
            $svFirstSectionService

    ){

        $this->svFirstSectionService=

            $svFirstSectionService;

    }





    public function save(Request $request)
    {


        $request->validate([


            'id'=>'nullable|integer',

            'feature'=>'nullable|array',

            'f_card'=>'nullable|array',

            's_card'=>'nullable|array',

            't_card'=>'nullable|array',


            'web_image'=>

            'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',



            'mobile_image'=>

            'nullable|image|mimes:jpg,jpeg,png,webp|max:4096'


        ]);





        $section =

        $this->svFirstSectionService

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

            $this->svFirstSectionService

            ->details($id),

            'Details fetched'

        );


    }




    public function list()
    {


        return $this->success(

            $this->svFirstSectionService

            ->list(),

            'List fetched'

        );


    }





    public function delete($id)
    {


        $this->svFirstSectionService

                ->delete($id);




        return $this->success(

            [],

            'Deleted successfully'

        );



    }




}
