<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SrFifthSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SrFifthSectionController extends Controller
{
    use ApiResponse;

    protected SrFifthSectionService $srFifthSectionService;

    public function __construct(
        SrFifthSectionService $srFifthSectionService
    ) {
        $this->srFifthSectionService =
            $srFifthSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer',

            'title' => 'nullable|string|max:255',
            'title_meta' => 'nullable|string|max:255',

            'description' => 'nullable|string',
            'desc_meta' => 'nullable|string',

            'position' => 'nullable|boolean',

            'heading' => 'nullable|string|max:255',
            'desc2' => 'nullable|string',

            'status' => 'nullable|boolean',
        ]);

        $section = $this->srFifthSectionService
            ->save($request);

        return $this->success(
            $section,
            'SR fifth section saved successfully'
        );
    }

    public function details($id)
    {
        $section = $this->srFifthSectionService
            ->details($id);

        if (!$section) {
            return $this->error(
                'SR fifth section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'SR fifth section fetched successfully'
        );
    }

    public function list()
    {
        return $this->success(
            $this->srFifthSectionService->list(),
            'SR fifth section list fetched successfully'
        );
    }

    public function delete($id)
    {
        $deleted = $this->srFifthSectionService
            ->delete($id);

        if (!$deleted) {
            return $this->error(
                'SR fifth section not found',
                [],
                404
            );
        }

        return $this->success(
            [],
            'SR fifth section deleted successfully'
        );
    }
}