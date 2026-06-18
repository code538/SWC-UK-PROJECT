<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sr_forth_sections', function (Blueprint $table) {
            $table->id();

            // Main Content
            $table->string('title')->nullable();
            $table->string('title_meta')->nullable();

            $table->longText('description')->nullable();
            $table->text('desc_meta')->nullable();

            // Images
            $table->string('web_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('image_alt')->nullable();

            // Secondary Content
            $table->string('title2')->nullable();
            $table->longText('desc2')->nullable();

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sr_forth_sections');
    }
};