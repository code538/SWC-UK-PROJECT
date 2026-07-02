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
        Schema::create('hr_compliance_third_sections', function (Blueprint $table) {

            $table->id();

            $table->string('batch')->nullable();
            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->string('title_meta')->nullable();

            $table->longText('description')->nullable();
            $table->text('desc_meta')->nullable();

            $table->string('title2')->nullable();
            $table->string('youtube_url')->nullable();

         
            $table->boolean('status')->default(1);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hr_compliance_third_sections');
    }
};