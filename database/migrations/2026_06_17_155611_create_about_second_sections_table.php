<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_second_sections', function (Blueprint $table) {

            $table->id();

            // Small Batch
            $table->string('batch')->nullable();

            // Section Title
            $table->string('title')->nullable();
            $table->string('title_meta')->nullable();


            // Story & Mission Buttons
            $table->string('button1_name')->nullable();
            $table->longText('button1_details')->nullable();

            $table->string('button2_name')->nullable();
            $table->longText('button2_details')->nullable();


            // Images
            $table->string('web_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('image_alt')->nullable();


            // Our Journey
            $table->longText('our_journey')->nullable();


            // CTA Buttons
            $table->string('button3_name')->nullable();
            $table->string('button3_url')->nullable();

            $table->string('button4_name')->nullable();
            $table->string('button4_url')->nullable();


            // Bottom Cards
            $table->string('card1_h')->nullable();
            $table->text('card1_d')->nullable();

            $table->string('card2_h')->nullable();
            $table->text('card2_d')->nullable();

            $table->string('card3_h')->nullable();
            $table->text('card3_d')->nullable();


            $table->boolean('status')
                    ->default(1)
                    ->comment('1=Active,0=Inactive');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_second_sections');
    }
};