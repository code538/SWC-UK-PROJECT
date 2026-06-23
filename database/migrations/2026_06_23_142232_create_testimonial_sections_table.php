<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('testimonial_sections', function (Blueprint $table) {

            $table->id();
            $table->string('batch')->nullable();
            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->longText('description')->nullable();

            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('image')->nullable();
            $table->decimal('rating', 2, 1)->default(5.0);

            $table->boolean('status')->default(1);
            $table->timestamps();

        });

    }


    public function down(): void
    {

        Schema::dropIfExists('testimonial_sections');

    }
};