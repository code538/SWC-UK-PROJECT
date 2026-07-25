<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rtw_first_sections', function (Blueprint $table) {

            $table->id();
            $table->string('batch')->nullable();

            $table->string('title')->nullable();
            $table->longText('description')->nullable();

            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();

            /*
            Feature Badges

            [
                {
                    "title":"IAA Regulated"
                },
                {
                    "title":"60 Seconds"
                },
                {
                    "title":"Free PDF Report"
                }
            ]
            */
            $table->json('features')->nullable();

            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rtw_first_sections');
    }
};