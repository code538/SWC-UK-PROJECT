<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\AboutSecondSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AboutSecondSectionController extends Controller
{
    use ApiResponse;

    protected AboutSecondSectionService $aboutSecondSectionService;


    public function __construct(

        AboutSecondSectionService $aboutSecondSectionService

    )
    {

        $this->aboutSecondSectionService =
            $aboutSecondSectionService;

    }


    public function save(Request $request)
    {

        $request->validate([

            'batch' => 'nullable|string|max:255',

            'title' => 'nullable|string|max:255',
            'title_meta' => 'nullable|string|max:255',


            'button1_name' => 'nullable|string|max:255',
            'button1_details' => 'nullable|string',

            'button2_name' => 'nullable|string|max:255',
            'button2_details' => 'nullable|string',


            'image_alt' => 'nullable|string|max:255',

            'our_journey' => 'nullable|string',


            'button3_name' => 'nullable|string|max:255',
            'button3_url' => 'nullable|string|max:255',

            'button4_name' => 'nullable|string|max:255',
            'button4_url' => 'nullable|string|max:255',


            'card1_h' => 'nullable|string|max:255',
            'card1_d' => 'nullable|string',

            'card2_h' => 'nullable|string|max:255',
            'card2_d' => 'nullable|string',

            'card3_h' => 'nullable|string|max:255',
            'card3_d' => 'nullable|string',


            'web_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',


            'status' => 'nullable|boolean'

        ]);


        $section = $this->aboutSecondSectionService
            ->save($request);


        return $this->success(

            $section,

            'About second section saved successfully'

        );
    }



    public function details()
    {

        $section = $this->aboutSecondSectionService
            ->details();


        if (!$section) {

            return $this->error(

                'About second section not found',

                [],

                404

            );
        }


        return $this->success(

            $section,

            'About second section fetched successfully'

        );
    }
}