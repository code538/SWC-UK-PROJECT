<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SponsorshipSecondSectionService;

class SponsorshipSecondSectionController extends Controller
{

    use ApiResponse;

    protected SponsorshipSecondSectionService $service;


    public function __construct(
        SponsorshipSecondSectionService $service
    )
    {
        $this->service = $service;
    }



    public function save(Request $request)
    {

        $request->validate([

            'id' => 'nullable|integer',

            'title' => 'nullable|string',

            'title_meta' => 'nullable|string',

            'description' => 'nullable|string',

            'desc_meta' => 'nullable|string',

            'steps' => 'nullable|string',

            'title2' => 'nullable|string',

            'title2_meta' => 'nullable|string',

            'desc2' => 'nullable|string',

            'desc2_meta' => 'nullable|string',

            'web_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'image_alt' => 'nullable|string',

            'status' => 'nullable|boolean'

        ]);


        $section = $this->service->save($request);

        return $this->success(

            $section,

            'Saved Successfully'

        );

    }



    public function details($id)
    {

        return $this->success(

            $this->service->details($id),

            'Details fetched'

        );

    }



    public function list()
    {

        return $this->success(

            $this->service->list(),

            'List fetched'

        );

    }



    public function delete($id)
    {

        $this->service->delete($id);

        return $this->success(

            [],

            'Deleted Successfully'

        );

    }

}