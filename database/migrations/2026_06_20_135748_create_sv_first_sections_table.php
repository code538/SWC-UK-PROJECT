<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('sv_first_sections', function (Blueprint $table) {

            $table->id();

            // Batch
            $table->string('batch')->nullable();


            // Heading
            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();


            // Content
            $table->longText('description')->nullable();


            // Seo
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();


            // Buttons

            $table->string('button1_name')->nullable();
            $table->string('button1_url')->nullable();


            $table->string('button2_name')->nullable();
            $table->string('button2_url')->nullable();



            /*
            Free Consultation
            24/7 Support
            Expert Team
            Fast Delivery
            */
            $table->json('feature')->nullable();



            // Images

            $table->string('web_image')->nullable();

            $table->string('mobile_image')->nullable();

            $table->string('image_alt')->nullable();



            /*
            250+ Projects Delivered
            */
            $table->json('f_card')->nullable();



            /*
            98% Client Satisfaction
            */
            $table->json('s_card')->nullable();



            /*
            12+ Years Experience
            */
            $table->json('t_card')->nullable();



            $table->boolean('status')
                ->default(1);



            $table->timestamps();

        });

    }


    public function down(): void
    {
        Schema::dropIfExists(
            'sv_first_sections'
        );
    }


};
