<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\HrComplianceFirstSectionService;

class HrComplianceFirstSectionController extends Controller
{

    use ApiResponse;

    protected HrComplianceFirstSectionService $service;

    public function __construct(
        HrComplianceFirstSectionService $service
    ) {

        $this->service = $service;

    }


    public function save(Request $request)
    {

        $request->validate([

            'batch' => 'nullable|string',

            'title' => 'nullable|string',

            'highlighted_text' => 'nullable|string',

            'title_meta' => 'nullable|string',

            'description' => 'nullable|string',

            'desc_meta' => 'nullable|string',

            'bg_web_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'bg_mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'image_alt' => 'nullable|string',

            'status' => 'nullable|boolean'

        ]);


        $section = $this->service->save($request);


        return $this->success(

            $section,

            'HR Compliance First Section saved successfully.'

        );

    }



    public function details()
    {

        return $this->success(

            $this->service->details(),

            'HR Compliance First Section fetched successfully.'

        );

    }

}