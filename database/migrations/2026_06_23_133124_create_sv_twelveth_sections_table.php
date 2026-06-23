<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create('sv_twelveth_sections', function (Blueprint $table) {

            $table->id();
            $table->string('batch')->nullable();

            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();
            $table->longText('description')->nullable();

            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();

            $table->text('note')->nullable();
            /*
            Cards
            [

                {

                    "icon":"passport",

                    "title":"Valid Passport",

                    "description":"..."

                }
            ]
            */
            $table->json('cards')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });


    }

    public function down(): void
    {

        Schema::dropIfExists(

            'sv_twelveth_sections'

        );

    }


};
