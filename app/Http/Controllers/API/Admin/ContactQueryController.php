<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\ContactQueryService;

class ContactQueryController extends Controller
{

    use ApiResponse;

    protected $service;

    public function __construct(
        ContactQueryService $service
    )
    {
        $this->service = $service;
    }

    /*
    |--------------------------------------------------------------------------
    | Public
    |--------------------------------------------------------------------------
    */

    public function save(Request $request)
    {
        //dd($request->all());
        $request->validate([

            'full_name' => 'required|string|max:255',

            'email' => 'required|email',

            'phone' => 'required|string|max:30',

            'service_category_id' => 'nullable|exists:service_categories,id',

            'service_sub_category_id' => 'nullable|exists:service_sub_categories,id',

            'description' => 'required|string',

            'source' => 'nullable|string'

        ]);

        return $this->success(

            $this->service->save($request),

            'Your enquiry has been submitted successfully.'

        );

    }



    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    public function list()
    {

        return $this->success(

            $this->service->list(),

            'Query list fetched successfully.'

        );

    }



    public function details($id)
    {

        return $this->success(

            $this->service->details($id),

            'Query details fetched successfully.'

        );

    }



    public function update(Request $request, $id)
    {

        return $this->success(

            $this->service->update($request, $id),

            'Query updated successfully.'

        );

    }



    public function delete($id)
    {

        $this->service->delete($id);

        return $this->success(

            [],

            'Query deleted successfully.'

        );

    }

}