<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('sv_fifth_sections', function (Blueprint $table) {

            $table->id();

            $table->string('batch')->nullable();
            $table->string('identifier')->nullable();



            /*
            Why Businesses Choose
            */
            $table->string('title')->nullable();



            /*
            Our Solutions
            */
            $table->string('highlighted_title')->nullable();



            $table->longText('description')->nullable();



            $table->string('title_meta')->nullable();

            $table->text('desc_meta')->nullable();




            /*
            cards
            */

            $table->json('features')->nullable();




            /*
            250+

            Projects Completed


            98%

            Client Satisfaction


            12+

            Years Experience


            24/7

            Dedicated Support
            */

            $table->json('statistics')->nullable();




            /*
            Investing In The Right Solution
            */

            $table->string('title2')->nullable();



            $table->text('short_desc')->nullable();




            $table->boolean('status')

                    ->default(1);



            $table->timestamps();

        });

    }



    public function down(): void
    {
        Schema::dropIfExists(

            'sv_fifth_sections'

        );
    }


};
