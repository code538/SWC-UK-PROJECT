<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\HrComplianceSecondSectionService;

class HrComplianceSecondSectionController extends Controller
{

    use ApiResponse;

    protected HrComplianceSecondSectionService $service;


    public function __construct(
        HrComplianceSecondSectionService $service
    )
    {

        $this->service = $service;

    }



    public function save(Request $request)
    {

        $request->validate([

            'batch' => 'nullable|string',

            'title' => 'nullable|string',

            'description' => 'nullable|string',

            'title_meta' => 'nullable|string',

            'desc_meta' => 'nullable|string',

            'features' => 'nullable|array',

            'button_name' => 'nullable|string',

            'button_url' => 'nullable|string',

            'button_note' => 'nullable|string',

            'status' => 'nullable|boolean'

        ]);


        $section = $this->service->save(

            $request

        );


        return $this->success(

            $section,

            'HR Compliance Second Section saved successfully.'

        );

    }



    public function details()
    {

        return $this->success(

            $this->service->details(),

            'HR Compliance Second Section fetched successfully.'

        );

    }

}