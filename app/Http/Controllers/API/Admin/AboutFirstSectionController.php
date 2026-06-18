<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\AboutFirstSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AboutFirstSectionController extends Controller
{

    use ApiResponse;


    protected AboutFirstSectionService $aboutFirstSectionService;


    public function __construct(

        AboutFirstSectionService $aboutFirstSectionService

    )
    {

        $this->aboutFirstSectionService
            = $aboutFirstSectionService;

    }



    public function save(Request $request)
    {

        $request->validate([

            'title'=>'nullable|string|max:255',

            'highlighted_text'=>'nullable|string|max:255',

            'description'=>'nullable|string',

            'title_meta'=>'nullable|string|max:255',

            'desc_meta'=>'nullable|string',


            'image_alt'=>'nullable|string|max:255',


            'button1_name'=>'nullable|string|max:255',
            'button1_url'=>'nullable|string|max:255',

            'button2_name'=>'nullable|string|max:255',
            'button2_url'=>'nullable|string|max:255',



            'bg_image'=>

                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',



            'status'=>'nullable|boolean'

        ]);



        $section = $this->aboutFirstSectionService
                    ->save($request);



        return $this->success(

            $section,

            'About first section saved successfully'

        );


    }





    public function details()
    {


        $section = $this->aboutFirstSectionService
                    ->details();



        if(!$section){


            return $this->error(

                'About first section not found',

                [],

                404

            );

        }



        return $this->success(

            $section,

            'About first section fetched successfully'

        );


    }


}
