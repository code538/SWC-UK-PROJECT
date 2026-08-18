<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sv_forth_sections', function (Blueprint $table) {

            $table->id();

            // FEATURES
            $table->string('batch')->nullable();
            $table->string('identifier')->nullable();

            // Powerful Features Built
            $table->string('title')->nullable();

            // For Modern Businesses
            $table->string('highlighted_title')->nullable();


            // Main Description
            $table->longText('description')->nullable();


            // SEO
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();



            /*
            [
                {
                    "icon":"globe",
                    "title":"Global Reach",
                    "description":"Expand your business worldwide."
                }
            ]
            */
            $table->json('features')->nullable();



            // Bottom CTA
            $table->string('title2')->nullable();

            $table->text('short_desc')->nullable();



            $table->boolean('status')
                    ->default(1);


            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sv_forth_sections');
    }
};