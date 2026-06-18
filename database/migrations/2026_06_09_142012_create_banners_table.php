<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            // Page
            $table->string('page_name');

            // Content
            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->string('title_meta')->nullable();

            $table->longText('description')->nullable();
            $table->string('desc_meta')->nullable();

            // Buttons
            $table->string('button1_text')->nullable();
            $table->string('button1_url')->nullable();

            $table->string('button2_text')->nullable();
            $table->string('button2_url')->nullable();

            // Media
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('video')->nullable();
            $table->string('video_meta')->nullable();

            // image | video
            $table->enum('media_type', [
                'image',
                'video'
            ])->default('image');

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};