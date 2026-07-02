<?php

namespace App\Services;

use App\Models\HrComplianceThirdSection;
use Illuminate\Http\Request;

class HrComplianceThirdSectionService extends BaseService
{

    public function save(Request $request)
    {

        return HrComplianceThirdSection::updateOrCreate(

            [

                'id' => 1

            ],

            [

                'batch' => $request->batch,

                'title' => $request->title,

                'highlighted_title' => $request->highlighted_title,

                'title_meta' => $request->title_meta,

                'description' => $request->description,

                'desc_meta' => $request->desc_meta,

                'status' => $request->status ?? 1

            ]

        );

    }



    public function details()
    {

        return HrComplianceThirdSection::first();

    }

}