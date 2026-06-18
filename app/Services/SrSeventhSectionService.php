<?php

namespace App\Services;

use App\Models\SrSeventhSection;
use Illuminate\Http\Request;

class SrSeventhSectionService extends BaseService
{
    public function save(Request $request)
    {
        return SrSeventhSection::updateOrCreate(
            ['id' => 1],
            [
                'title' => $request->title,
                'highlighted_title' => $request->highlighted_title,

                'description' => $request->description,

                'title_meta' => $request->title_meta,
                'desc_meta' => $request->desc_meta,

                'button_name' => $request->button_name,
                'button_url' => $request->button_url,

                'button2_name' => $request->button2_name,
                'button2_url' => $request->button2_url,

                'status' => $request->status ?? 1,
            ]
        );
    }

    public function details()
    {
        return SrSeventhSection::first();
    }
}