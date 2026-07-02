<?php

namespace App\Services;

use App\Models\HrComplianceSecondSection;
use Illuminate\Http\Request;

class HrComplianceSecondSectionService extends BaseService
{

    public function save(Request $request)
    {

        return HrComplianceSecondSection::updateOrCreate(

            [

                'id' => 1

            ],

            [

                'batch' => $request->batch,

                'title' => $request->title,

                'description' => $request->description,

                'title_meta' => $request->title_meta,

                'desc_meta' => $request->desc_meta,

                'features' => $request->features,

                'button_name' => $request->button_name,

                'button_url' => $request->button_url,

                'button_note' => $request->button_note,

                'status' => $request->status ?? 1

            ]

        );

    }



    public function details()
    {

        return HrComplianceSecondSection::first();

    }

}