<?php

namespace App\Services;

use App\Models\RtwFirstSection;
use Illuminate\Http\Request;

class RtwFirstSectionService extends BaseService
{

    public function save(Request $request)
    {

        return RtwFirstSection::updateOrCreate(

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

                'status' => $request->status ?? 1

            ]

        );

    }



    public function details()
    {

        return RtwFirstSection::first();

    }



    public function list()
    {

        return RtwFirstSection::first();

    }

}