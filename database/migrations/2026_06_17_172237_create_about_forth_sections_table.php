<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_forth_sections', function (Blueprint $table) {

            $table->id();

            $table->string('batch')->nullable();

            $table->string('title')->nullable();
            $table->longText('description')->nullable();

            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();


            // Images

            $table->string('web_image1')->nullable();
            $table->string('mobile_image1')->nullable();

            $table->string('web_image2')->nullable();
            $table->string('mobile_image2')->nullable();

            $table->string('image1_alt')->nullable();
            $table->string('image2_alt')->nullable();


            // Cards

            $table->string('card1_title')->nullable();
            $table->json('card1_desc')->nullable();


            $table->string('card2_title')->nullable();
            $table->json('card2_desc')->nullable();


            $table->string('card3_title')->nullable();
            $table->json('card3_desc')->nullable();


            $table->string('card4_title')->nullable();
            $table->json('card4_desc')->nullable();


            $table->string('card5_title')->nullable();
            $table->json('card5_desc')->nullable();



            $table->boolean('status')
                    ->default(1)
                    ->comment('1=Active,0=Inactive');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_forth_sections');
    }
};