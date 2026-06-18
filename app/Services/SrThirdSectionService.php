<?php

namespace App\Services;

use App\Models\SrThirdSection;
use Illuminate\Http\Request;

class SrThirdSectionService extends BaseService
{
    public function save(Request $request)
    {
        return SrThirdSection::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ?? 1,
            ]
        );
    }

    public function edit($id)
    {
        return SrThirdSection::find($id);
    }

    public function details()
    {
        return SrThirdSection::where(
            'status',
            1
        )
        ->get();
    }
}