<?php

namespace App\Services;

use App\Models\SrFifthSection;
use Illuminate\Http\Request;

class SrFifthSectionService extends BaseService
{
    public function save(Request $request)
    {
        return SrFifthSection::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'title' => $request->title,
                'title_meta' => $request->title_meta,

                'description' => $request->description,
                'desc_meta' => $request->desc_meta,

                'position' => $request->position ?? 0,

                'heading' => $request->heading,
                'desc2' => $request->desc2,

                'status' => $request->status ?? 1,
            ]
        );
    }

    public function details($id)
    {
        return SrFifthSection::find($id);
    }

    public function list()
    {
        return SrFifthSection::latest()->get();
    }

    public function delete($id)
    {
        $section = SrFifthSection::find($id);

        if (!$section) {
            return false;
        }

        return $section->delete();
    }
}