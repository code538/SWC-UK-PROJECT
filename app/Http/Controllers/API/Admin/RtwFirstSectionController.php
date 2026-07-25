<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\RtwFirstSectionService;

class RtwFirstSectionController extends Controller
{

    use ApiResponse;

    protected RtwFirstSectionService $rtwFirstSectionService;

    public function __construct(
        RtwFirstSectionService $rtwFirstSectionService
    ) {

        $this->rtwFirstSectionService = $rtwFirstSectionService;

    }



    public function save(Request $request)
    {

        $request->validate([

            'batch' => 'nullable|string|max:255',

            'title' => 'nullable|string',

            'description' => 'nullable|string',

            'title_meta' => 'nullable|string',

            'desc_meta' => 'nullable|string',

            'features' => 'nullable|array',

            'button_name' => 'nullable|string',

            'button_url' => 'nullable|string',

            'status' => 'nullable|boolean'

        ]);


        $section = $this->rtwFirstSectionService->save($request);


        return $this->success(

            $section,

            'RTW First Section saved successfully.'

        );

    }




    public function details()
    {

        $section = $this->rtwFirstSectionService->details();

        if (!$section) {

            return $this->error(

                'RTW First Section not found',

                [],

                404

            );

        }


        return $this->success(

            $section,

            'RTW First Section fetched successfully.'

        );

    }




    public function list()
    {

        return $this->success(

            $this->rtwFirstSectionService->list(),

            'RTW First Section list fetched successfully.'

        );

    }

}