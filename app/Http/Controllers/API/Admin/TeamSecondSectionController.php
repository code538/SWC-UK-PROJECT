<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\TeamSecondSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TeamSecondSectionController extends Controller
{
    use ApiResponse;

    protected TeamSecondSectionService $teamSecondSectionService;

    public function __construct(
        TeamSecondSectionService $teamSecondSectionService
    ) {
        $this->teamSecondSectionService =
            $teamSecondSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'batch' => 'nullable|string|max:255',

            'title' => 'nullable|string|max:255',
            'title_meta' => 'nullable|string|max:255',

            'description' => 'nullable|string',
            'desc_meta' => 'nullable|string',

            'status' => 'nullable|boolean',
        ]);

        $section = $this->teamSecondSectionService
            ->save($request);

        return $this->success(
            $section,
            'Team second section saved successfully'
        );
    }

    public function details()
    {
        $section = $this->teamSecondSectionService
            ->details();

        if (!$section) {
            return $this->error(
                'Team second section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'Team second section fetched successfully'
        );
    }
}