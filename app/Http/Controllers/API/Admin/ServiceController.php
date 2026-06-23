<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\ServiceService;

class ServiceController extends Controller
{

    use ApiResponse;


    protected ServiceService $serviceService;



    public function __construct(

        ServiceService $serviceService

    )
    {

        $this->serviceService =

            $serviceService;

    }




    public function save(Request $request)
    {


        $request->validate([


            'title'=>'nullable|string',


            'description'=>'nullable|string',



            'title_meta'=>'nullable|string',


            'desc_meta'=>'nullable|string',




            'web_bg_image'=>

                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',



            'mobile_bg_image'=>

                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',




            'image_alt'=>'nullable|string',



            'button1_name'=>'nullable|string',
            'button1_url'=>'nullable|string',



            'button2_name'=>'nullable|string',
            'button2_url'=>'nullable|string',



            'status'=>'nullable|boolean'



        ]);




        $service =

            $this->serviceService

                ->save(

                    $request

                );




        return $this->success(

            $service,

            'Services Saved Successfully'

        );



    }




    public function details()
    {


        return $this->success(

            $this->serviceService

                ->details(),

            'Details fetched successfully'

        );


    }


}