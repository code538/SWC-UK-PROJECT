<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_sub_category_sections', function (Blueprint $table) {

            $table->id();

            $table->foreignId('service_sub_category_id')
                ->constrained('service_sub_categories')
                ->cascadeOnDelete();

            $table->string('section_name');
            $table->unsignedBigInteger('section_id');

            $table->integer('order_by')
                ->default(0);

            $table->boolean('status')
                ->default(1)
                ->comment('1=Active,0=Inactive');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'service_sub_category_sections'
        );
    }
};