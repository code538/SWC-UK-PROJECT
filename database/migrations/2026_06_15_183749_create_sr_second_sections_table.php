<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sr_second_sections', function (Blueprint $table) {
            $table->id();

            // Heading
            $table->string('batch')->nullable();

            $table->string('title')->nullable();
            $table->string('title_meta')->nullable();

            // Description
            $table->longText('description')->nullable();
            $table->text('desc_meta')->nullable();

            // Images
            $table->string('image1')->nullable();
            $table->string('image1_alt')->nullable();

            $table->string('image2')->nullable();
            $table->string('image2_alt')->nullable();

            $table->string('image3')->nullable();
            $table->string('image3_alt')->nullable();

            // Features
            $table->longText('features')->nullable();

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sr_second_sections');
    }
};