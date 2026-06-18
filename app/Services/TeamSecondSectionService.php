<?php

namespace App\Services;

use App\Models\TeamSecondSection;
use Illuminate\Http\Request;

class TeamSecondSectionService extends BaseService
{
    public function save(Request $request)
    {
        return TeamSecondSection::updateOrCreate(
            ['id' => 1],
            [
                'batch' => $request->batch,

                'title' => $request->title,
                'title_meta' => $request->title_meta,

                'description' => $request->description,
                'desc_meta' => $request->desc_meta,

                'status' => $request->status ?? 1,
            ]
        );
    }

    public function details()
    {
        return TeamSecondSection::first();
    }
}