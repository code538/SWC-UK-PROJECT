<?php

namespace App\Http\Controllers\API\Public;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

use App\Services\AboutPageService;

class AboutController extends Controller
{

    use ApiResponse;


    protected AboutPageService $aboutPageService;



    public function __construct(

        AboutPageService $aboutPageService

    ){

        $this->aboutPageService =
                $aboutPageService;

    }



    public function details()
    {


        $data = $this->aboutPageService
                    ->aboutPage();



        return $this->success(

            $data,

            'About page fetched successfully'

        );



    }


}
