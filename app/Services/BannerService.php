<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerService extends BaseService
{
    public function save(Request $request)
    {
        $banner = Banner::where(
            'page_name',
            $request->page_name
        )->first();

        $data = $request->except([
            'image',
            'video'
        ]);

        if ($request->hasFile('image')) {

            if ($banner?->image) {
                $this->deleteFile($banner->image);
            }

            $data['image'] = $this->uploadFile(
                $request->file('image'),
                'banners/images'
            );
        }

        if ($request->hasFile('video')) {

            if ($banner?->video) {
                $this->deleteFile($banner->video);
            }

            $data['video'] = $this->uploadFile(
                $request->file('video'),
                'banners/videos'
            );
        }

        return Banner::updateOrCreate(
            [
                'page_name' => $request->page_name
            ],
            $data
        );
    }

    public function details(string $page)
    {
        $banner = Banner::where(
            'page_name',
            $page
        )->first();

        if ($banner) {

            $banner->image = $this->fileUrl(
                $banner->image
            );

            $banner->video = $this->fileUrl(
                $banner->video
            );
        }

        return $banner;
    }

    public function all()
    {
        $banners = Banner::latest()->get();

        foreach ($banners as $banner) {

            $banner->image = $this->fileUrl(
                $banner->image
            );

            $banner->video = $this->fileUrl(
                $banner->video
            );
        }

        return $banners;
    }
}