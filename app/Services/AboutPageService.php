<?php

namespace App\Services;

class AboutPageService
{


    public function aboutPage()
    {


        return [

            'about_first_section'=>app(
                AboutFirstSectionService::class
            )->details(),



            'about_second_section'=>app(
                AboutSecondSectionService::class
            )->details(),



            'about_third_section'=>app(
                AboutThirdSectionService::class
            )->details(),



            'about_forth_section'=>app(
                AboutForthSectionService::class
            )->details(),


        ];


    }



}