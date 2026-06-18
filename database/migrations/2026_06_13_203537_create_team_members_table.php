<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('name');
            $table->string('slug')->unique();

            $table->string('designation')->nullable();

            // Images
            $table->string('web_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('image_alt')->nullable();

            // Contact
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();

            // Experience
            $table->string('experience')->nullable();

            // Short Content
            $table->text('short_desc')->nullable();

            // Buttons
            $table->string('button1_name')->nullable();
            $table->string('button1_url')->nullable();

            $table->string('button2_name')->nullable();
            $table->string('button2_url')->nullable();

            // Long Content
            $table->longText('long_desc')->nullable();

            // Expertise
            $table->text('expertise')->nullable();

            // Additional Description
            $table->longText('desc2')->nullable();

            // CTA Button
            $table->string('button3_name')->nullable();
            $table->string('button3_url')->nullable();

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};