<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_third_sections', function (Blueprint $table) {

            $table->id();

            // Header
            $table->string('batch')->nullable();

            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();

            $table->longText('description')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();


            // Buttons

            $table->string('button1_name')->nullable();
            $table->string('button1_url')->nullable();

            $table->string('button2_name')->nullable();
            $table->string('button2_url')->nullable();


            // Video

            $table->string('youtube_url')->nullable();


            // Images

            $table->string('web_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('image_alt')->nullable();


            // Cards

            $table->string('card1_tit')->nullable();
            $table->text('card1_det')->nullable();


            $table->string('card2_tit')->nullable();
            $table->text('card2_det')->nullable();


            $table->string('card3_tit')->nullable();
            $table->text('card3_det')->nullable();


            $table->boolean('status')
                    ->default(1)
                    ->comment('1=Active,0=Inactive');


            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_third_sections');
    }
};