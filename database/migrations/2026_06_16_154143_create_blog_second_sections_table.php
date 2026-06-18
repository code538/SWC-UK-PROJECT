<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_second_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('slug')->unique();

            $table->string('category')->nullable();

            $table->string('web_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('image_alt')->nullable();

            $table->longText('long_desc')->nullable();

            $table->text('desc_meta')->nullable();

            $table->date('date')->nullable();

            $table->boolean('popular')
                  ->default(0)
                  ->comment('0=No,1=Yes');

            $table->integer('last_read')
                  ->default(0);

            $table->string('social_title')->nullable();

            $table->text('social_desc')->nullable();

            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_second_sections');
    }
};