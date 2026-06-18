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
        Schema::create('first_sections', function (Blueprint $table) {
            $table->id();

            $table->string('page_name')->unique();

            // Top Tags
            $table->string('tags')->nullable();

            // Title
            $table->string('small_title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->string('title_meta')->nullable();

            // Description
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('description_meta')->nullable();

            // Buttons
            $table->string('button1_text')->nullable();
            $table->string('button1_url')->nullable();

            $table->string('button2_text')->nullable();
            $table->string('button2_url')->nullable();

            // Statistics
            $table->string('stat1_value')->nullable();
            $table->string('stat1_text')->nullable();

            $table->string('stat2_value')->nullable();
            $table->string('stat2_text')->nullable();

            $table->string('stat3_value')->nullable();
            $table->string('stat3_text')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frst_sections');
    }
};
