<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('team_first_sections', function (Blueprint $table) {
            $table->id();

            // Heading
            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->string('title_meta')->nullable();

            // Content
            $table->text('description')->nullable();
            $table->string('desc_meta')->nullable();

            // Buttons
            $table->string('button1_name')->nullable();
            $table->string('button1_url')->nullable();

            $table->string('button2_name')->nullable();
            $table->string('button2_url')->nullable();

            // Images
            $table->string('web_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('image_alt')->nullable();

            // Status
            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_first_sections');
    }
};
