<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SrSixthSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SrSixthSectionController extends Controller
{
    use ApiResponse;

    protected SrSixthSectionService $srSixthSectionService;

    public function __construct(
        SrSixthSectionService $srSixthSectionService
    ) {
        $this->srSixthSectionService =
            $srSixthSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer',

            'title' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'heading' => 'nullable|string|max:255',

            'title_meta' => 'nullable|string|max:255',

            'desc_meta' => 'nullable|string',

            'status' => 'nullable|boolean',
        ]);

        $section = $this->srSixthSectionService
            ->save($request);

        return $this->success(
            $section,
            'SR sixth section saved successfully'
        );
    }

    public function details($id)
    {
        $section = $this->srSixthSectionService
            ->details($id);

        if (!$section) {
            return $this->error(
                'SR sixth section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'SR sixth section fetched successfully'
        );
    }

    public function list()
    {
        return $this->success(
            $this->srSixthSectionService->list(),
            'SR sixth section list fetched successfully'
        );
    }

    public function delete($id)
    {
        $deleted = $this->srSixthSectionService
            ->delete($id);

        if (!$deleted) {
            return $this->error(
                'SR sixth section not found',
                [],
                404
            );
        }

        return $this->success(
            [],
            'SR sixth section deleted successfully'
        );
    }
}