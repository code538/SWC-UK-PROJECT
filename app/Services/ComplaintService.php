<?php

namespace App\Services;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintService extends BaseService
{

    /*
    |--------------------------------------------------------------------------
    | Public Save
    |--------------------------------------------------------------------------
    */

    public function save(Request $request)
    {

        $data = [

            'organization_name' => $request->organization_name,

            'group_name' => $request->group_name,

            'full_name' => $request->full_name,

            'email' => $request->email,

            'phone' => $request->phone,

            'complaint_type' => $request->complaint_type,

            'description' => $request->description,

           // 'source' => $request->source,

            'user_agent' => $request->userAgent(),

            'status' => 'new'

        ];


        if($request->hasFile('attachment'))
        {

            $data['attachment'] = $this->uploadFile(

                $request->file('attachment'),

                'complaints'

            );

        }


        return Complaint::create(

            $data

        );

    }



    /*
    |--------------------------------------------------------------------------
    | Admin List
    |--------------------------------------------------------------------------
    */

    public function list()
    {

        $complaints = Complaint::

            // with(

            //     'employee'

            // )

            latest();

           // ->paginate(20);


        foreach($complaints as $item)
        {

            $item->attachment =

                $this->fileUrl(

                    $item->attachment

                );

        }


        return $complaints;

    }




    public function details($id)
    {

        $complaint = Complaint::

            with(

                'employee'

            )

            ->find($id);


        if($complaint)
        {

            $complaint->attachment =

                $this->fileUrl(

                    $complaint->attachment

                );

        }


        return $complaint;

    }




    public function update(Request $request,$id)
    {

        $complaint = Complaint::findOrFail(

            $id

        );


        $complaint->update([

            'status'=>$request->status,

            'admin_note'=>$request->admin_note,

            'assigned_to'=>$request->assigned_to,

            'follow_up_at'=>$request->follow_up_at

        ]);


        return $complaint;

    }




    public function delete($id)
    {

        $complaint = Complaint::find($id);

        if(!$complaint){

            return false;

        }


        if($complaint->attachment){

            $this->deleteFile(

                $complaint->attachment

            );

        }


        return $complaint->delete();

    }

}