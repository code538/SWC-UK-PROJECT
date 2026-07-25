<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sponsorship_first_sections', function (Blueprint $table) {

            $table->id();

            $table->string('batch')->nullable();

            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->longText('description')->nullable();
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();



            /*
            Statistics

            [
                {
                    "number":"100%",
                    "title":"Control"
                },
                {
                    "number":"90%",
                    "title":"Success Rate"
                }
            ]
            */

            $table->json('statistics')->nullable();



            /*
            Certifications

            [
                {
                    "title":"IAA",
                    "image":"..."
                },
                {
                    "title":"Cyber Essentials",
                    "image":"..."
                }
            ]
            */

            $table->json('certifications')->nullable();

            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();

            $table->string('web_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('card_badge')->nullable();
            $table->string('card_title')->nullable();
            $table->string('card_description')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sponsorship_first_sections');
    }
};