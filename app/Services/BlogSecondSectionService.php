<?php

namespace App\Services;

use App\Models\BlogSecondSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogSecondSectionService extends BaseService
{
    public function save(Request $request)
    {
        $blog = BlogSecondSection::find(
            $request->id
        );

        $data = $request->except([
            'web_image',
            'mobile_image'
        ]);

        if ($request->hasFile('web_image')) {

            if ($blog?->web_image) {
                $this->deleteFile(
                    $blog->web_image
                );
            }

            $data['web_image'] = $this->uploadFile(
                $request->file('web_image'),
                'blogs'
            );
        }

        if ($request->hasFile('mobile_image')) {

            if ($blog?->mobile_image) {
                $this->deleteFile(
                    $blog->mobile_image
                );
            }

            $data['mobile_image'] = $this->uploadFile(
                $request->file('mobile_image'),
                'blogs'
            );
        }

        if (empty($request->id)) {

            $slug = Str::slug($request->title);

            $count = BlogSecondSection::where(
                'slug',
                'LIKE',
                $slug . '%'
            )->count();

            $data['slug'] = $count > 0
                ? $slug . '-' . ($count + 1)
                : $slug;
        } else {

             $slug = Str::slug($request->title);

            $count = BlogSecondSection::where(
                'slug',
                'LIKE',
                $slug . '%'
            )->count();

            $data['slug'] = $count > 0
                ? $slug . '-' . ($count + 1)
                : $slug;
        }

        return BlogSecondSection::updateOrCreate(
            [
                'id' => $request->id
            ],
            $data
        );
    }

    public function details($id)
    {
        $blog = BlogSecondSection::find($id);

        if ($blog) {

            $blog->web_image = $this->fileUrl(
                $blog->web_image
            );

            $blog->mobile_image = $this->fileUrl(
                $blog->mobile_image
            );
        }

        return $blog;
    }

    public function list()
    {
        $blogs = BlogSecondSection::latest()->get();

        foreach ($blogs as $blog) {

            $blog->web_image = $this->fileUrl(
                $blog->web_image
            );

            $blog->mobile_image = $this->fileUrl(
                $blog->mobile_image
            );
        }

        return $blogs;
    }

    public function delete($id)
    {
        $blog = BlogSecondSection::find($id);

        if (!$blog) {
            return false;
        }

        if ($blog->web_image) {
            $this->deleteFile(
                $blog->web_image
            );
        }

        if ($blog->mobile_image) {
            $this->deleteFile(
                $blog->mobile_image
            );
        }

        return $blog->delete();
    }

    // Public methods

    public function allBlogs()
    {
        $blogFirstSection = app(
            BlogFirstSectionService::class
        )->details();

        $blogs = BlogSecondSection::where(
            'status',
            1
        )->latest()
        ->get();

        foreach ($blogs as $blog) {

            $blog->web_image = $this->fileUrl(
                $blog->web_image
            );

            $blog->mobile_image = $this->fileUrl(
                $blog->mobile_image
            );
        }

        $latestBlogs = BlogSecondSection::where(
            'status',
            1
        )
        ->orderBy('date', 'desc')
        ->take(5)
        ->get();

        foreach ($latestBlogs as $blog) {

            $blog->web_image = $this->fileUrl(
                $blog->web_image
            );

            $blog->mobile_image = $this->fileUrl(
                $blog->mobile_image
            );
        }

        return [
            'blog_first_section' => $blogFirstSection,
            'blogs' => $blogs,
            'latest_blogs' => $latestBlogs,
        ];
    }

    public function detailsBySlug(string $slug)
    {
        $blog = BlogSecondSection::where(
            'slug',
            $slug
        )->where(
            'status',
            1
        )->first();

        if ($blog) {

            $blog->web_image = $this->fileUrl(
                $blog->web_image
            );

            $blog->mobile_image = $this->fileUrl(
                $blog->mobile_image
            );
        }

        $latestBlogs = BlogSecondSection::where(
            'status',
            1
        )
        ->orderBy('date', 'desc')
        ->take(5)
        ->get();

        foreach ($latestBlogs as $blog) {

            $blog->web_image = $this->fileUrl(
                $blog->web_image
            );

            $blog->mobile_image = $this->fileUrl(
                $blog->mobile_image
            );
        }

         return [
            'blog' => $blog,
            'latest_blogs' => $latestBlogs,
        ];
    }
}