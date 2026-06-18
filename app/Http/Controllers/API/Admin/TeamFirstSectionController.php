<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\TeamFirstSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TeamFirstSectionController extends Controller
{
    use ApiResponse;

    protected TeamFirstSectionService $teamFirstSectionService;

    public function __construct(
        TeamFirstSectionService $teamFirstSectionService
    ) {
        $this->teamFirstSectionService =
            $teamFirstSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'highlighted_title' => 'nullable|string|max:255',
            'title_meta' => 'nullable|string|max:255',

            'description' => 'nullable|string',
            'desc_meta' => 'nullable|string|max:255',

            'button1_name' => 'nullable|string|max:255',
            'button1_url' => 'nullable|string|max:255',

            'button2_name' => 'nullable|string|max:255',
            'button2_url' => 'nullable|string|max:255',

            'image_alt' => 'nullable|string|max:255',

            'web_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'mobile_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'status' => 'nullable|boolean',
        ]);

        $teamFirstSection =
            $this->teamFirstSectionService
                ->save($request);

        return $this->success(
            $teamFirstSection,
            'Team first section saved successfully'
        );
    }

    public function details()
    {
        $teamFirstSection =
            $this->teamFirstSectionService
                ->details();

        if (!$teamFirstSection) {

            return $this->error(
                'Team first section not found',
                [],
                404
            );
        }

        return $this->success(
            $teamFirstSection,
            'Team first section fetched successfully'
        );
    }

    public function pageDetails()
    {
        $data = $this->teamFirstSectionService
            ->pageDetails();

        return $this->success(
            $data,
            'Team page data fetched successfully'
        );
    }
}