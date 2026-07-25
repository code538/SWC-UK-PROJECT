<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sponsorship_second_sections', function (Blueprint $table) {

            $table->id();

            /*
            Main Heading
            */
            $table->string('title')->nullable();

            $table->string('title_meta')->nullable();

            /*
            Main Description
            */
            $table->longText('description')->nullable();

            $table->text('desc_meta')->nullable();



            /*
            Steps

            [
                {
                    "number":"01",
                    "title":"Register Your Company",
                    "description":"..."
                },
                {
                    "number":"02",
                    "title":"Apply For Sponsor Licence",
                    "description":"..."
                }
            ]
            */

            $table->string('steps')->nullable();



            /*
            Right Side Content
            */

            $table->string('title2')->nullable();

            $table->string('title2_meta')->nullable();

            $table->longText('desc2')->nullable();

            $table->text('desc2_meta')->nullable();



            /*
            Images
            */

            $table->string('web_image')->nullable();

            $table->string('mobile_image')->nullable();

            $table->string('image_alt')->nullable();



            $table->boolean('status')->default(1);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'sponsorship_second_sections'
        );
    }
};