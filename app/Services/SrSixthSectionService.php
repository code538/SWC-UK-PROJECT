<?php

namespace App\Services;

use App\Models\SrSixthSection;
use Illuminate\Http\Request;

class SrSixthSectionService extends BaseService
{
    public function save(Request $request)
    {
        return SrSixthSection::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'title' => $request->title,
                'description' => $request->description,
                'heading' => $request->heading,
                'title_meta' => $request->title_meta,
                'desc_meta' => $request->desc_meta,
                'status' => $request->status ?? 1,
            ]
        );
    }

    public function details($id)
    {
        return SrSixthSection::find($id);
    }

    public function list()
    {
        return SrSixthSection::latest()->get();
    }

    public function delete($id)
    {
        $section = SrSixthSection::find($id);

        if (!$section) {
            return false;
        }

        return $section->delete();
    }
}