<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\TestimonialSectionService;

class TestimonialSectionController extends Controller
{

    use ApiResponse;


    protected TestimonialSectionService
                $testimonialService;



    public function __construct(

        TestimonialSectionService
            $testimonialService

    ){

        $this->testimonialService =

                $testimonialService;

    }




    public function save(Request $request)
    {
        $request->validate([
            'id'=>'nullable|integer',
            'batch'=>'nullable|string',
            'title'=>'nullable|string',
            'highlighted_title'=>'nullable|string',
            'description'=>'nullable|string',
            'name'=>'nullable|string',
            'designation'=>'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating'=>'nullable|numeric|min:1|max:5',
            'status'=>'nullable|boolean'
        ]);

        $testimonial = $this->testimonialService->save($request);
        return $this->success(
            $testimonial,
            'Testimonial saved successfully'
        );


    }





    public function details($id)
    {
        return $this->success($this->testimonialService->details($id),
            'Details fetched'
        );
    }




    public function list()
    {
        return $this->success(
            $this->testimonialService->list(),
            'List fetched'
        );
    }




    public function delete($id)
    {
        $this->testimonialService->delete($id);
        return $this->success(
            [],
            'Deleted successfully'
        );
    }



}
