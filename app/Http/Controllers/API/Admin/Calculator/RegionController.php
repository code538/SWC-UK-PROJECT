<?php

namespace App\Http\Controllers\API\Admin\Calculator;

use App\Http\Controllers\Controller;
use App\Services\Calculator\RegionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    use ApiResponse;

    protected RegionService $regionService;

    public function __construct(RegionService $regionService)
    {
        $this->regionService = $regionService;
    }

    /**
     * Create / Update Region
     */
    public function save(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'name'       => 'required|string|max:255',
            'code'       => 'required|string|max:10',
            'is_active'  => 'nullable|boolean',
        ]);

        $region = $this->regionService->save($request);

        return $this->success(
            $region,
            'Region saved successfully.'
        );
    }

    /**
     * Region Details
     */
    public function details($id)
    {
        $region = $this->regionService->details($id);

        if (!$region) {
            return $this->error(
                'Region not found.',
                [],
                404
            );
        }

        return $this->success(
            $region,
            'Region fetched successfully.'
        );
    }

    /**
     * Region List
     */
    public function list()
    {
        return $this->success(
            $this->regionService->all(),
            'Region list fetched successfully.'
        );
    }

    /**
     * Delete Region
     */
    public function delete($id)
    {
        $region = $this->regionService->details($id);

        if (!$region) {
            return $this->error(
                'Region not found.',
                [],
                404
            );
        }

        $this->regionService->delete($id);

        return $this->success(
            [],
            'Region deleted successfully.'
        );
    }
}