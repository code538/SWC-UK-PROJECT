<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up(): void
    {
        Schema::create('sv_eleventh_sections', function (Blueprint $table) {
            $table->id();
            /*
            WHY CHOOSE US
            */
            $table->string('batch')->nullable();
            $table->string('identifier')->nullable();

            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->longText('description')->nullable();
            /*
            SEO
            */
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();
            /*
            Cards


            [

                {

                    "icon":"shield",

                    "title":"Trusted Immigration Experts",

                    "description":""

                },
                {

                    "icon":"award",

                    "title":"High Success Rate",

                    "description":""

                }
            ]
            */

            $table->json('cards')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });


    }




    public function down(): void
    {

        Schema::dropIfExists(

            'sv_eleventh_sections'

        );

    }



};