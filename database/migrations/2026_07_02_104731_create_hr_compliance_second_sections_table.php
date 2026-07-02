<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hr_compliance_second_sections', function (Blueprint $table) {

            $table->id();

            $table->string('batch')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('title_meta')->nullable();
            $table->text('desc_meta')->nullable();

            /*
            Bullet Points

            [
                "Covers record keeping, reporting duties and right-to-work",
                "Tailored findings + recommended next steps",
                "PDF report emailed instantly",
                "Reviewed by IAA-regulated specialists"
            ]
            */
            $table->json('features')->nullable();

            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_note')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hr_compliance_second_sections');
    }
};