<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\FaqService;

class FaqController extends Controller
{

    use ApiResponse;


    protected $faqService;



    public function __construct(

        FaqService $faqService

    )

    {

        $this->faqService =

            $faqService;

    }





    public function save(Request $request)
    {


        $request->validate([


            'id'=>'nullable',


            'slug'=>'required',


            'question'=>'required',


            'answer'=>'required',


            'status'=>'nullable|boolean'


        ]);



        $faq = $this->faqService

                    ->save(

                        $request

                    );




        return $this->success(

            $faq,

            'FAQ Saved Successfully'

        );


    }




    public function details($id)
    {



        return $this->success(

            $this->faqService

                ->details(

                    $id

                ),


            'Details fetched'

        );


    }





    public function list()
    {


        return $this->success(

            $this->faqService

                ->list(),

            'FAQ List'

        );


    }





    public function delete($id)
    {


        $this->faqService

            ->delete(

                $id

            );



        return $this->success(

            [],

            'Deleted Successfully'

        );


    }




    /*
    Public API
    */

    public function bySlug($slug)
    {


        return $this->success(

            $this->faqService

                ->getBySlug(

                    $slug

                ),


            'FAQ fetched successfully'

        );


    }



}
