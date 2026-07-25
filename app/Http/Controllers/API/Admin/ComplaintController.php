<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\ComplaintService;

class ComplaintController extends Controller
{

    use ApiResponse;

    protected ComplaintService $service;


    public function __construct(

        ComplaintService $service

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

        $request->validate([

            'organization_name'=>'nullable|string|max:255',

            'group_name'=>'nullable|string|max:255',

            'full_name'=>'required|string|max:255',

            'email'=>'required|email',

            'phone'=>'nullable|string|max:30',

            'complaint_type'=>'required|string',

            'description'=>'required|string',

            'attachment'=>'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',

            'source'=>'nullable|string'

        ]);
        //dd($request->all());

        return $this->success(

            $this->service->save(

                $request

            ),

            'Complaint submitted successfully.'

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

            'Complaint list fetched successfully.'

        );

    }




    public function details($id)
    {

        return $this->success(

            $this->service->details(

                $id

            ),

            'Complaint details fetched successfully.'

        );

    }




    public function update(Request $request,$id)
    {

        return $this->success(

            $this->service->update(

                $request,

                $id

            ),

            'Complaint updated successfully.'

        );

    }




    public function delete($id)
    {

        $this->service->delete(

            $id

        );


        return $this->success(

            [],

            'Complaint deleted successfully.'

        );

    }

}