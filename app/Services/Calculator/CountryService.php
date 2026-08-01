<?php

namespace App\Services\Calculator;

use App\Models\Calculator\Country;
use App\Services\BaseService;
use Illuminate\Http\Request;

class CountryService extends BaseService
{
    /**
     * Create or Update Country
     */
    public function save(Request $request)
    {
        return Country::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name'              => $request->name,
                'code'              => strtoupper($request->code),
                'iso3'              => strtoupper($request->iso3),
                'currency'          => strtoupper($request->currency),
                'currency_symbol'   => $request->currency_symbol,
                'is_active'         => $request->boolean('is_active'),
            ]
        );
    }

    /**
     * Country Details
     */
    public function details(int $id)
    {
        return Country::find($id);
    }

    /**
     * Country List
     */
    public function all()
    {
        return Country::latest()->get();
    }

    /**
     * Delete Country
     */
    public function delete(int $id): bool
    {
        $country = Country::findOrFail($id);

        return $country->delete();
    }
}