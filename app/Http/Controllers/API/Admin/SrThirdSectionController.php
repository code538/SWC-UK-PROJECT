<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\SrThirdSectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SrThirdSectionController extends Controller
{
    use ApiResponse;

    protected SrThirdSectionService $srThirdSectionService;

    public function __construct(
        SrThirdSectionService $srThirdSectionService
    ) {
        $this->srThirdSectionService =
            $srThirdSectionService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $section = $this->srThirdSectionService
            ->save($request);

        return $this->success(
            $section,
            'SR third section saved successfully'
        );
    }

    public function details()
    {
        $section = $this->srThirdSectionService
            ->details();

        if (!$section) {

            return $this->error(
                'SR third section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'SR third section fetched successfully'
        );
    }

    public function edit($id)
    {
        $section = $this->srThirdSectionService
            ->edit($id);

        if (!$section) {

            return $this->error(
                'SR third section not found',
                [],
                404
            );
        }

        return $this->success(
            $section,
            'SR third section fetched successfully'
        );
    }    
}