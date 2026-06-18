<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SrSeventhSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SrSeventhSectionController extends Controller
{
    use ApiResponse;

    protected SrSeventhSectionService $srSeventhSectionService;

    public function __construct(
        SrSeventhSectionService $srSeventhSectionService
    ) {
        $this->srSeventhSectionService =
            $srSeventhSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'highlighted_title' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'title_meta' => 'nullable|string|max:255',
            'desc_meta' => 'nullable|string',

            'button_name' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',

            'button2_name' => 'nullable|string|max:255',
            'button2_url' => 'nullable|string|max:255',

            'status' => 'nullable|boolean',
        ]);

        $section = $this->srSeventhSectionService
            ->save($request);

        return $this->success(
            $section,
            'SR seventh section saved successfully'
        );
    }

    public function details()
    {
        $section = $this->srSeventhSectionService
            ->details();

        if (!$section) {
            return $this->error(
                'SR seventh section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'SR seventh section fetched successfully'
        );
    }
}