<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\AboutThirdSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AboutThirdSectionController extends Controller
{

    use ApiResponse;


    protected AboutThirdSectionService $aboutThirdSectionService;


    public function __construct(

        AboutThirdSectionService $aboutThirdSectionService

    ){

        $this->aboutThirdSectionService =
            $aboutThirdSectionService;

    }



    public function save(Request $request)
    {

        $request->validate([


            'batch'=>'nullable|string|max:255',

            'title'=>'nullable|string|max:255',

            'highlighted_title'=>'nullable|string|max:255',

            'description'=>'nullable|string',


            'meta_title'=>'nullable|string|max:255',

            'meta_desc'=>'nullable|string',


            'button1_name'=>'nullable|string|max:255',

            'button1_url'=>'nullable|string|max:255',


            'button2_name'=>'nullable|string|max:255',

            'button2_url'=>'nullable|string|max:255',


            'youtube_url'=>'nullable|string',


            'image_alt'=>'nullable|string|max:255',


            'card1_tit'=>'nullable|string|max:255',
            'card1_det'=>'nullable|string',

            'card2_tit'=>'nullable|string|max:255',
            'card2_det'=>'nullable|string',

            'card3_tit'=>'nullable|string|max:255',
            'card3_det'=>'nullable|string',


            'web_image'=>

                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'mobile_image'=>

                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',


            'status'=>'nullable|boolean'

        ]);



        $section = $this->aboutThirdSectionService
                    ->save($request);



        return $this->success(

            $section,

            'About third section saved successfully'

        );

    }




    public function details()
    {

        $section = $this->aboutThirdSectionService
                    ->details();


        if(!$section){

            return $this->error(

                'About third section not found',

                [],

                404

            );

        }



        return $this->success(

            $section,

            'About third section fetched successfully'

        );

    }


}