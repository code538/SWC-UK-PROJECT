<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code',2)->unique();
            $table->string('iso3',3)->nullable();

            $table->string('currency',3)->default('GBP');
            $table->string('currency_symbol',5)->default('£');

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('country_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->string('code');

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(['country_id','name']);
        });

        Schema::create('tax_years', function (Blueprint $table) {
            $table->id();

            $table->foreignId('region_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->date('start_date');

            $table->date('end_date');

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(['region_id','name']);
        });

        Schema::create('tax_codes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tax_year_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('code');

            $table->decimal('personal_allowance',12,2);

            $table->string('description')->nullable();

            $table->timestamps();

            $table->unique(['tax_year_id','code']);

        });

        Schema::create('tax_bands', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tax_year_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('region_id')
                    ->constrained()
                    ->cascadeOnDelete();    

            $table->string('name');

            $table->decimal('from_amount',12,2);

            $table->decimal('to_amount',12,2)->nullable();

            $table->decimal('rate',5,2);

            $table->unsignedTinyInteger('band_order');

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });

        Schema::create('ni_categories', function (Blueprint $table) {

            $table->id();

            $table->string('code')->unique();

            $table->string('description');

            $table->timestamps();

        });

        Schema::create('ni_bands', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tax_year_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('ni_category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->decimal('from_amount',12,2);

            $table->decimal('to_amount',12,2)->nullable();

            $table->decimal('employee_rate',5,2);

            $table->decimal('employer_rate',5,2);

            $table->timestamps();
        });

        Schema::create('student_loan_plans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tax_year_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->decimal('threshold',12,2);

            $table->decimal('rate',5,2);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

        });

        Schema::create('pension_options', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('code')->nullable();

            $table->decimal('employee_rate',5,2);

            $table->decimal('employer_rate',5,2);

            $table->boolean('is_percentage')->default(true);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('tax_years');
        Schema::dropIfExists('tax_codes');
        Schema::dropIfExists('tax_bands');
        Schema::dropIfExists('ni_categories');
        Schema::dropIfExists('ni_bands');
        Schema::dropIfExists('student_loan_plans');
        Schema::dropIfExists('pension_options');
        
    }
};
