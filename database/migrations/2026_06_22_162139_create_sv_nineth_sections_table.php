<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create('sv_nineth_sections', function (Blueprint $table) {
            $table->id();
            $table->string('batch')->nullable();
            $table->string('identifier')->nullable();
            
            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->longText('description')->nullable();

            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();
            /*
            Pricing Cards
            [

                {

                    "icon":"rocket",

                    "batch":"",

                    "title":"Starter",

                    "subtitle":"Perfect for startups",

                    "price":"$999",

                    "features":[

                        "Responsive Website",
                        "Up to 5 Pages",
                        "Basic SEO"

                    ],

                    "button_name":"Get Started",

                    "button_url":"/contact"

                }


            ]
            */
            $table->json('plans')->nullable();

            $table->string('title2')->nullable();
            $table->text('short_desc')->nullable();

            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });

    }

    public function down(): void
    {

        Schema::dropIfExists('sv_nineth_sections');

    }


};
