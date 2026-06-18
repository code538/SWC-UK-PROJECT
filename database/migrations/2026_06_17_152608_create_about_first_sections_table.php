<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_first_sections', function (Blueprint $table) {
            $table->id();

            // Heading
            $table->string('title')->nullable();
            $table->string('highlighted_text')->nullable();

            // Content
            $table->longText('description')->nullable();

            // SEO
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();

            // Background Image
            $table->string('bg_image')->nullable();
            $table->string('image_alt')->nullable();

            // Buttons
            $table->string('button1_name')->nullable();
            $table->string('button1_url')->nullable();

            $table->string('button2_name')->nullable();
            $table->string('button2_url')->nullable();

            // Status
            $table->boolean('status')
                  ->default(1)
                  ->comment('1 = Active, 0 = Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_first_sections');
    }
};