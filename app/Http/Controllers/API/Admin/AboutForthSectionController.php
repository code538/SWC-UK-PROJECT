<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\AboutForthSectionService;

class AboutForthSectionController extends Controller
{

    use ApiResponse;


    protected AboutForthSectionService $aboutForthSectionService;



    public function __construct(

        AboutForthSectionService $aboutForthSectionService

    ){

        $this->aboutForthSectionService =
            $aboutForthSectionService;

    }



    public function save(Request $request)
    {


        $request->validate([


            'batch'=>'nullable|string',

            'title'=>'nullable|string',

            'description'=>'nullable|string',

            'title_meta'=>'nullable|string',

            'desc_meta'=>'nullable|string',



            'image1_alt'=>'nullable|string',
            'image2_alt'=>'nullable|string',



            'card1_title'=>'nullable|string',
            'card2_title'=>'nullable|string',
            'card3_title'=>'nullable|string',
            'card4_title'=>'nullable|string',
            'card5_title'=>'nullable|string',



            'card1_desc'=>'nullable|array',
            'card2_desc'=>'nullable|array',
            'card3_desc'=>'nullable|array',
            'card4_desc'=>'nullable|array',
            'card5_desc'=>'nullable|array',



            'web_image1'=>'nullable|image',
            'mobile_image1'=>'nullable|image',

            'web_image2'=>'nullable|image',
            'mobile_image2'=>'nullable|image',



            'status'=>'nullable|boolean'


        ]);


        $section = $this->aboutForthSectionService
                        ->save($request);



        return $this->success(

            $section,

            'About forth section saved successfully'

        );


    }




    public function details()
    {


        $section = $this->aboutForthSectionService
                        ->details();



        if(!$section){

            return $this->error(

                'Data not found',

                [],

                404

            );
        }



        return $this->success(

            $section,

            'About forth section fetched successfully'

        );


    }



}