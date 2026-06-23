<?php

namespace App\Http\Controllers\API\Public;

use App\Http\Controllers\Controller;
use App\Services\ServiceSubCategoryService;
use App\Traits\ApiResponse;
use App\Services\ServiceService;
use App\Services\FaqService;
use App\Services\TestimonialSectionService;
use App\Services\ServiceCategoryService;

class ServiceController extends Controller
{

    use ApiResponse;

    protected ServiceSubCategoryService $serviceSubCategoryService;


    public function __construct(
        ServiceSubCategoryService $serviceSubCategoryService
    )
    {
        $this->serviceSubCategoryService =
            $serviceSubCategoryService;
    }


    /**
     * Mega menu
     *
     * /api/services
     *
     */
    public function services()
    {

        $services = $this->serviceSubCategoryService
                        ->servicesMenu();


        return $this->success(

            $services,

            'Services fetched successfully'

        );

    }




    /**
     * Service Details
     *
     * /api/service/sponsor-license-renewal
     *
     */

    public function details($slug)
    {
        $service = $this->serviceSubCategoryService
                        ->serviceDetails(
                            $slug
                        );



        if(!$service){

            return $this->error(

                'Service not found',

                [],

                404

            );

        }



        return $this->success(

            $service,

            'Service details fetched successfully'

        );


    }

    public function home()
    {


        $hero = app(ServiceService::class)

                ->details();



        $categories = app(ServiceCategoryService::class)

                ->menu();






        $testimonials = app(TestimonialSectionService::class)

                ->publicList();




        $faqs = app(FaqService::class)

                ->getBySlug(

                    'services'

                );




        return $this->success(


            [


                'hero'=>$hero,


                'categories'=>$categories,


                'testimonials'=>$testimonials,


                'faqs'=>$faqs



            ],



            'Services page fetched successfully'


        );



    }



}
