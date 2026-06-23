<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();

            $table->longText('description')->nullable();

            $table->string('title_meta')->nullable();

            $table->text('desc_meta')->nullable();


            $table->string('web_bg_image')->nullable();

            $table->string('mobile_bg_image')->nullable();

            $table->string('image_alt')->nullable();

            $table->string('button1_name')
                    ->nullable();

            $table->string('button1_url')
                    ->nullable();


            $table->string('button2_name')
                    ->nullable();

            $table->string('button2_url')
                    ->nullable();

            $table->boolean('status')
                    ->default(1);



            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists(
            'services'
        );
    }
};