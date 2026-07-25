<?php

namespace App\Services;

use App\Models\ContactQuery;
use Illuminate\Http\Request;

class ContactQueryService
{

    /*
    |--------------------------------------------------------------------------
    | Public Save
    |--------------------------------------------------------------------------
    */

    public function save(Request $request)
    {
     
        return ContactQuery::create([

            'full_name' => $request->full_name,

            'email' => $request->email,

            'phone' => $request->phone,

            'service_category_id' => $request->service_category_id,

            'service_sub_category_id' => $request->service_sub_category_id,

            'description' => $request->description,

            'source' => $request->source,

            'user_agent' => $request->userAgent(),

            'status' => 'new'

        ]);

    }

   



    /*
    |--------------------------------------------------------------------------
    | Admin List
    |--------------------------------------------------------------------------
    */

    public function list()
    {

        return ContactQuery::

            with([

                'category',

                'subCategory',

                'employee'

            ])

            ->latest()

            ->paginate(20);

    }



    /*
    |--------------------------------------------------------------------------
    | Details
    |--------------------------------------------------------------------------
    */

    public function details($id)
    {

        return ContactQuery::

            with([

                'category',

                'subCategory',

                'employee'

            ])

            ->find($id);

    }



    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {

        $query = ContactQuery::findOrFail($id);

        $query->update([

            'status' => $request->status,

            'admin_note' => $request->admin_note,

            'assigned_to' => $request->assigned_to,

            'follow_up_at' => $request->follow_up_at

        ]);

        return $query;

    }



    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {

        return ContactQuery::

            where('id', $id)

            ->delete();

    }

}