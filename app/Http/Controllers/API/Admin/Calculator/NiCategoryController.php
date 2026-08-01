<?php

namespace App\Http\Controllers\API\Admin\Calculator;

use App\Http\Controllers\Controller;
use App\Services\Calculator\NiCategoryService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class NiCategoryController extends Controller
{
    use ApiResponse;

    protected NiCategoryService $niCategoryService;

    public function __construct(
        NiCategoryService $niCategoryService
    ) {
        $this->niCategoryService = $niCategoryService;
    }

    /**
     * Create / Update NI Category
     */
    public function save(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10',
            'description' => 'required|string|max:255',
        ]);

        $niCategory = $this->niCategoryService->save(
            $request
        );

        return $this->success(
            $niCategory,
            'NI category saved successfully.'
        );
    }

    /**
     * NI Category Details
     */
    public function details($id)
    {
        $niCategory = $this->niCategoryService->details(
            $id
        );

        if (!$niCategory) {
            return $this->error(
                'NI category not found.',
                [],
                404
            );
        }

        return $this->success(
            $niCategory,
            'NI category fetched successfully.'
        );
    }

    /**
     * NI Category List
     */
    public function list()
    {
        return $this->success(
            $this->niCategoryService->all(),
            'NI category list fetched successfully.'
        );
    }

    /**
     * Delete NI Category
     */
    public function delete($id)
    {
        $niCategory = $this->niCategoryService->details(
            $id
        );

        if (!$niCategory) {
            return $this->error(
                'NI category not found.',
                [],
                404
            );
        }

        $this->niCategoryService->delete(
            $id
        );

        return $this->success(
            [],
            'NI category deleted successfully.'
        );
    }
}