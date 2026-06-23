<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceService extends BaseService
{

    public function save(Request $request)
    {

        $service = Service::first();

        $data = $request->except(

            'web_bg_image',

            'mobile_bg_image'

        );


        if($request->hasFile('web_bg_image'))
        {

            if($service?->web_bg_image)
            {

                $this->deleteFile(

                    $service->web_bg_image

                );

            }


            $data['web_bg_image'] =

                $this->uploadFile(

                    $request->file(

                        'web_bg_image'

                    ),

                    'services'

                );

        }



        if($request->hasFile('mobile_bg_image'))
        {

            if($service?->mobile_bg_image)
            {

                $this->deleteFile(

                    $service->mobile_bg_image

                );

            }



            $data['mobile_bg_image']=

                $this->uploadFile(

                    $request->file(

                        'mobile_bg_image'

                    ),

                    'services'

                );

        }




        return Service::updateOrCreate(

            [

                'id'=>1

            ],

            $data

        );


    }




    public function details()
    {


        $service = Service::first();



        if($service)
        {


            $service->web_bg_image =

                $this->fileUrl(

                    $service->web_bg_image

                );




            $service->mobile_bg_image =

                $this->fileUrl(

                    $service->mobile_bg_image

                );


        }



        return $service;


    }



}