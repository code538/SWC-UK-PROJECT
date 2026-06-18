<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sr_seventh_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('highlighted_title')->nullable();

            $table->longText('description')->nullable();

            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();

            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();

            $table->string('button2_name')->nullable();
            $table->string('button2_url')->nullable();

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sr_seventh_sections');
    }
};