<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\ServiceSubCategory;
use App\Models\ServiceCategory;
use App\Services\DynamicSectionLoaderService;

class ServiceSubCategoryService
{


    public function save(Request $request)
    {


        $data = [

            'service_category_id'
                    =>$request->service_category_id,

            'name'
                    =>$request->name,


            'slug'
                    =>$request->slug

                        ? Str::slug($request->slug)

                        : Str::slug($request->name),



            'order'
                    =>$request->order ?? 0,


            'status'
                    =>$request->status ?? 1


        ];




        return ServiceSubCategory::updateOrCreate(

            [

                'id'=>$request->id

            ],

            $data

        );



    }




    public function details($id)
    {

        return ServiceSubCategory::with(

            'category'

        )

        ->find($id);


    }



    public function list()
    {


        return ServiceSubCategory::with(

            'category'

        )

        ->orderBy('order')

        ->get();


    }



    public function activeList()
    {


        return ServiceSubCategory::with(

            'category'

        )

        ->where(

            'status',

            1

        )

        ->orderBy('order')

        ->get();


    }




    public function delete($id)
    {


        $subcategory = ServiceSubCategory::find($id);


        if(!$subcategory){

            return false;
        }



        return $subcategory->delete();


    }

    public function serviceDetails($slug)
    {
        $subcategory = ServiceSubCategory::where(

                            'slug',

                            $slug

                        )

                        ->first();

        //dd($subcategory);

        if(!$subcategory){

            return null;
        }




        $sections = app(

                        DynamicSectionLoaderService::class

                    )

                    ->loadSections(

                        $subcategory->id

                    );


        return [


            'subcategory'=>$subcategory,


            'sections'=>$sections


        ];



    }

    public function servicesMenu()
    {

        return ServiceCategory::with([

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

            ->where(

                'status',

                1

            )

            ->orderBy(

                'order'

            )

            ->get();

    }




}