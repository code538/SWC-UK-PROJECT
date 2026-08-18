<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sv_third_sections', function (Blueprint $table) {

            $table->id();

            // Small Batch Title
            $table->string('batch')->nullable();
            $table->string('identifier')->nullable();

            // Main Heading
            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();

            // Description
            $table->longText('description')->nullable();

            // SEO
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();


            // Feature Cards
            $table->string('card1_title')->nullable();
            $table->string('card2_title')->nullable();
            $table->string('card3_title')->nullable();
            $table->string('card4_title')->nullable();


            // CTA Area
            $table->string('title2')->nullable();
            $table->text('short_desc')->nullable();

            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();


            // Status
            $table->boolean('status')
                    ->default(1);


            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists(
            'sv_third_sections'
        );
    }
};