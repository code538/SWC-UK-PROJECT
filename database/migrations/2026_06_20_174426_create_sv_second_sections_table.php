<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('sv_second_sections', function (Blueprint $table) {

            $table->id();

            // OUR IMPACT
            $table->string('batch')->nullable();
            $table->string('identifier')->nullable();

            // Trusted By Businesses
            $table->string('title')->nullable();

            // Across Industries
            $table->string('highlighted_title')->nullable();


            // Description
            $table->longText('description')->nullable();


            // SEO
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();


            /*
                [
                    {
                        "number":"250+",
                        "title":"Projects Delivered",
                        "description":"Successfully completed projects"
                    },
                    {
                        "number":"98%",
                        "title":"Success Rate",
                        "description":"Achieving goals"
                    }
                ]
            */

            $table->json('feature')->nullable();


            // Bottom Blue Bar
            $table->string('tag_line')->nullable();


            $table->boolean('status')
                    ->default(1);


            $table->timestamps();

        });

    }

    public function down(): void
    {
        Schema::dropIfExists('sv_second_sections');
    }
};