<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sr_fifth_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('title_meta')->nullable();

            $table->longText('description')->nullable();
            $table->text('desc_meta')->nullable();

            $table->boolean('position')
                  ->default(0)
                  ->comment('0=Left,1=Right');

            $table->string('heading')->nullable();

            $table->longText('desc2')->nullable();

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sr_fifth_sections');
    }
};