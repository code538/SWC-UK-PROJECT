<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sr_sixth_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();

            $table->longText('description')->nullable();

            $table->string('heading')->nullable();

            $table->string('title_meta')->nullable();

            $table->text('desc_meta')->nullable();

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sr_sixth_sections');
    }
};