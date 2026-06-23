<?php

namespace App\Services;

use App\Models\TestimonialSection;
use Illuminate\Http\Request;

class TestimonialSectionService extends BaseService
{


  public function save(Request $request)
    {

        $section = null;

        if ($request->id) {

            $section = TestimonialSection::find($request->id);

        }


        $data = [

            'batch' => $request->batch,

            'title' => $request->title,

            'highlighted_title' => $request->highlighted_title,

            'description' => $request->description,

            'name' => $request->name,

            'designation' => $request->designation,

            'rating' => $request->rating ?? 5,

            'status' => $request->status ?? 1,

        ];


        if ($request->hasFile('image')) {


            if ($section?->image) {

                $this->deleteFile(

                    $section->image

                );

            }


            $data['image'] = $this->uploadFile(

                $request->file('image'),

                'testimonial-section'

            );

        }


        return TestimonialSection::updateOrCreate(

            [

                'id' => $request->id

            ],

            $data

        );

    }

    public function details($id)
    {

        $section = TestimonialSection::find($id);


        if ($section) {

            $section->image = $this->fileUrl(

                $section->image

            );

        }


        return $section;

    }

    public function list()
    {

        $sections = TestimonialSection::latest()->get();


        foreach ($sections as $section) {

            $section->image = $this->fileUrl(

                $section->image

            );

        }


        return $sections;

    }




    public function delete($id)
    {
        $testimonial = TestimonialSection::find($id);
        if(!$testimonial){
            return false;
        }
        return $testimonial->delete();
    }

    public function publicList()
    {
        $data = TestimonialSection::

                where(

                    'status',

                    1

                )

                ->latest()

                ->get();




        foreach($data as $item)
        {
            $item->image =

                    $this->fileUrl(

                        $item->image

                    );
        }
        return $data;
    }




}
