<?php

namespace App\Services;

use App\Models\BlogFirstSection;
use Illuminate\Http\Request;

class BlogFirstSectionService extends BaseService
{
    public function save(Request $request)
    {
        $blogFirstSection = BlogFirstSection::first();

        $data = $request->except([
            'web_image',
            'mobile_image'
        ]);


        if ($request->hasFile('web_image')) {

            if ($blogFirstSection?->web_image) {

                $this->deleteFile(
                    $blogFirstSection->web_image
                );
            }

            $data['web_image'] = $this->uploadFile(
                $request->file('web_image'),
                'blog-first-section'
            );
        }


        if ($request->hasFile('mobile_image')) {

            if ($blogFirstSection?->mobile_image) {

                $this->deleteFile(
                    $blogFirstSection->mobile_image
                );
            }

            $data['mobile_image'] = $this->uploadFile(
                $request->file('mobile_image'),
                'blog-first-section'
            );
        }


        return BlogFirstSection::updateOrCreate(

            ['id' => 1],

            array_merge($data, [

                'image_alt' => $request->image_alt,

                'status' => $request->status ?? 1

            ])
        );
    }

    public function details()
    {
        return BlogFirstSection::first();
    }
}