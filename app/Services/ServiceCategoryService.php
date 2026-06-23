<?php

namespace App\Services;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryService
{

    public function save(Request $request)
    {

        $data = [

            'name' => $request->name,
            'description'=> $request->description,

            'slug' => $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->name),

            'order' => $request->order ?? 0,

            'status' => $request->status ?? 1

        ];


        return ServiceCategory::updateOrCreate(

            [
                'id' => $request->id
            ],

            $data

        );

    }



    public function details($id)
    {

        return ServiceCategory::find($id);

    }



    public function list()
    {

        return ServiceCategory::where(

            'status',

            1

        )
        ->orderBy('order')
        ->get();

    }



    public function adminList()
    {

        return ServiceCategory::orderBy('order')
                    ->get();

    }




    public function delete($id)
    {

        $category = ServiceCategory::find($id);


        if(!$category){

            return false;

        }


        return $category->delete();

    }

    public function menu()
    {


        return ServiceCategory::

                where(

                    'status',

                    1

                )



                ->with([


                    'subcategories'=>function($q){


                        $q->where(

                            'status',

                            1

                        )

                        ->orderBy(

                            'order'

                        );


                    }


                ])



                ->orderBy(

                    'order'

                )



                ->get();



    }


}