<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('sv_tenth_sections', function (Blueprint $table) {

            $table->id();
            $table->string('batch')->nullable();

            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->longText('description')->nullable();
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();

            $table->string('title2')->nullable();

            $table->longText('short_desc')->nullable();

            $table->string('challenge_title')->nullable();
            $table->longText('challenge_desc')->nullable();

            $table->string('strategy_title')->nullable();
            $table->longText('strategy_desc')->nullable();

            /*
            Services Provided
            [
                "Sponsor Licence Application",
                "Compliance Audit",
                "Document Preparation"
            ]
            */
            $table->json('services')->nullable();

            /*
            Results
            [

                "Sponsor Licence Approved",

                "Reduced Hiring Costs"

            ]
            */

            $table->json('results')->nullable();

            $table->string('testimonial_title')->nullable();
            $table->longText('testimonial_desc')->nullable();

            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });


    }



    public function down(): void
    {

        Schema::dropIfExists(

            'sv_tenth_sections'

        );

    }


};