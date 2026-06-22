<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sv_sixth_sections', function (Blueprint $table) {

            $table->id();

            /*
            OUR SERVICES
            */
            $table->string('batch')->nullable();


            /*
            Solutions Designed
            */
            $table->string('title')->nullable();


            /*
            For Every Business Need
            */
            $table->string('highlighted_title')->nullable();



            $table->longText('description')->nullable();



            $table->string('title_meta')->nullable();

            $table->text('desc_meta')->nullable();



            /*
            Services List
            */
            $table->json('services')->nullable();



            /*
            Bottom CTA
            */

            $table->string('title2')->nullable();

            $table->text('short_desc')->nullable();


            $table->string('button_name')->nullable();

            $table->string('button_url')->nullable();



            $table->boolean('status')

                    ->default(1);


            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists(

            'sv_sixth_sections'

        );
    }
};
