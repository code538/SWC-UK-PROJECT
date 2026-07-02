<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\HrComplianceThirdSectionService;

class HrComplianceThirdSectionController extends Controller
{

    use ApiResponse;

    protected HrComplianceThirdSectionService $service;

    public function __construct(
        HrComplianceThirdSectionService $service
    ) {

        $this->service = $service;

    }


    public function save(Request $request)
    {

        $request->validate([

            'batch' => 'nullable|string',

            'title' => 'nullable|string',

            'highlighted_title' => 'nullable|string',

            'title_meta' => 'nullable|string',

            'description' => 'nullable|string',

            'desc_meta' => 'nullable|string',

            'status' => 'nullable|boolean'

        ]);


        $section = $this->service->save($request);


        return $this->success(

            $section,

            'HR Compliance Third Section saved successfully.'

        );

    }



    public function details()
    {

        return $this->success(

            $this->service->details(),

            'HR Compliance Third Section fetched successfully.'

        );

    }

}