<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SrForthSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SrForthSectionController extends Controller
{
    use ApiResponse;

    protected SrForthSectionService $srForthSectionService;

    public function __construct(
        SrForthSectionService $srForthSectionService
    ) {
        $this->srForthSectionService =
            $srForthSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer',

            'title' => 'nullable|string|max:255',
            'title_meta' => 'nullable|string|max:255',

            'description' => 'nullable|string',
            'desc_meta' => 'nullable|string',

            'title2' => 'nullable|string|max:255',
            'desc2' => 'nullable|string',

            'image_alt' => 'nullable|string|max:255',

            'web_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'mobile_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'status' => 'nullable|boolean',
        ]);

        $section = $this->srForthSectionService
            ->save($request);

        return $this->success(
            $section,
            'SR forth section saved successfully'
        );
    }

    public function details($id)
    {
        $section = $this->srForthSectionService
            ->details($id);

        if (!$section) {

            return $this->error(
                'SR forth section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'SR forth section fetched successfully'
        );
    }

    public function list()
    {
        return $this->success(
            $this->srForthSectionService->list(),
            'SR forth section list fetched successfully'
        );
    }

    public function delete($id)
    {
        $deleted = $this->srForthSectionService
            ->delete($id);

        if (!$deleted) {

            return $this->error(
                'SR forth section not found',
                [],
                404
            );
        }

        return $this->success(
            [],
            'SR forth section deleted successfully'
        );
    }
}