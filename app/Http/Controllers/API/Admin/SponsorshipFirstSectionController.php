<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\SponsorshipFirstSectionService;

class SponsorshipFirstSectionController extends Controller
{

    use ApiResponse;

    protected SponsorshipFirstSectionService $service;

    public function __construct(
        SponsorshipFirstSectionService $service
    ) {

        $this->service = $service;

    }



    public function save(Request $request)
    {

        $request->validate([

            'batch' => 'nullable|string',

            'title' => 'nullable|string',

            'highlighted_title' => 'nullable|string',

            'description' => 'nullable|string',

            'title_meta' => 'nullable|string',

            'desc_meta' => 'nullable|string',

            'statistics' => 'nullable|array',

            'certifications' => 'nullable|array',

            'button_name' => 'nullable|string',

            'button_url' => 'nullable|string',

            'web_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'image_alt' => 'nullable|string',

            'card_badge' => 'nullable|string',

            'card_title' => 'nullable|string',

            'card_description' => 'nullable|string',

            'status' => 'nullable|boolean'

        ]);


        $section = $this->service->save($request);


        return $this->success(

            $section,

            'Sponsorship First Section saved successfully.'

        );

    }



    public function details()
    {

        return $this->success(

            $this->service->details(),

            'Sponsorship First Section fetched successfully.'

        );

    }

}