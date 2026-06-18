<?php

namespace App\Services;

use App\Models\BlogFirstSection;
use Illuminate\Http\Request;

class BlogFirstSectionService extends BaseService
{
    public function save(Request $request)
    {
        return BlogFirstSection::updateOrCreate(
            ['id' => 1],
            [
                'batch' => $request->batch,

                'title' => $request->title,
                'highlighted_title' => $request->highlighted_title,

                'description' => $request->description,

                'title_meta' => $request->title_meta,
                'desc_meta' => $request->desc_meta,

                'status' => $request->status ?? 1,
            ]
        );
    }

    public function details()
    {
        return BlogFirstSection::first();
    }
}