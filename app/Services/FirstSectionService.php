<?php

namespace App\Services;

use App\Models\FirstSection;
use Illuminate\Http\Request;

class FirstSectionService extends BaseService
{
    public function save(Request $request)
    {
        return FirstSection::updateOrCreate(
            [
                'page_name' => $request->page_name
            ],
            [
                'tags' => $request->tags,

                'small_title' => $request->small_title,
                'highlighted_title' => $request->highlighted_title,
                'title_meta' => $request->title_meta,

                'short_description' => $request->short_description,
                'description' => $request->description,
                'description_meta' => $request->description_meta,

                'button1_text' => $request->button1_text,
                'button1_url' => $request->button1_url,

                'button2_text' => $request->button2_text,
                'button2_url' => $request->button2_url,

                'number' => $request->number,
                'number_text' => $request->number_text,

                'rate' => $request->rate,
                'rate_text' => $request->rate_text,

                'support' => $request->support,
                'support_text' => $request->support_text,

                'status' => $request->status ?? 1,
            ]
        );
    }

    public function details(string $page)
    {
        return FirstSection::where(
            'page_name',
            $page
        )->first();
    }

    public function all()
    {
        return FirstSection::latest()->get();
    }
}