<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqService
{


    public function save(Request $request)
    {
        return Faq::updateOrCreate(
            [
                'id'=>$request->id
            ],
            [
                'slug'=>$request->slug,
                'question'=>$request->question,
                'answer'=>$request->answer,
                'status'=>$request->status ?? 1
            ]
        );


    }

    public function details($id)
    {
        return Faq::find($id);
    }

    public function list()
    {
        return Faq::latest()->get();
    }

    public function getBySlug($slug)
    {
        return Faq::where('slug',$slug)
            ->where('status',1)->get();
    }

    public function delete($id)
    {
        $faq = Faq::find($id);

        if(!$faq){
            return false;
        }
        return $faq->delete();
    }


}
