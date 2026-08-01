<?php

namespace App\Http\Controllers\API\Admin\Calculator;

use App\Http\Controllers\Controller;
use App\Services\Calculator\CountryService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use ApiResponse;

    protected CountryService $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Create / Update Country
     */
    public function save(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'code'             => 'required|string|max:2',
            'iso3'             => 'nullable|string|max:3',
            'currency'         => 'required|string|max:3',
            'currency_symbol'  => 'required|string|max:5',
            'is_active'        => 'nullable|boolean',
        ]);

        $country = $this->countryService->save($request);

        return $this->success(
            $country,
            'Country saved successfully.'
        );
    }

    /**
     * Country Details
     */
    public function details($id)
    {
        $country = $this->countryService->details($id);

        if (!$country) {
            return $this->error(
                'Country not found.',
                [],
                404
            );
        }

        return $this->success(
            $country,
            'Country fetched successfully.'
        );
    }

    /**
     * Country List
     */
    public function list()
    {
        return $this->success(
            $this->countryService->all(),
            'Country list fetched successfully.'
        );
    }

    /**
     * Delete Country
     */
    public function delete($id)
    {
        $country = $this->countryService->details($id);

        if (!$country) {
            return $this->error(
                'Country not found.',
                [],
                404
            );
        }

        $this->countryService->delete($id);

        return $this->success(
            [],
            'Country deleted successfully.'
        );
    }
}