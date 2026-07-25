<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('form_type')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('form_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')
                ->constrained('forms')
                ->cascadeOnDelete();

            $table->text('question_text');
            $table->text('helper_text')->nullable();
            $table->string('question_type')->default('single_choice');
            $table->unsignedInteger('question_order');
            $table->boolean('is_required')->default(true);
            $table->timestamps();

            $table->unique(['form_id', 'question_order']);
        });

        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')
                ->constrained('form_questions')
                ->cascadeOnDelete();

            $table->string('option_text', 500);
            $table->unsignedInteger('option_order');
            $table->integer('score_value')->default(0);
            $table->timestamps();

            $table->unique(['question_id', 'option_order']);
        });

        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')
                ->constrained('forms')
                ->restrictOnDelete();

            // Final screen company information
            $table->string('company_name')->nullable();
            $table->string('business_email')->nullable();
            $table->string('phone_number', 50)->nullable();

            $table->string('status')->default('in_progress');
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('submission_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')
                ->constrained('form_submissions')
                ->cascadeOnDelete();

            $table->foreignId('question_id')
                ->constrained('form_questions')
                ->restrictOnDelete();

            $table->foreignId('selected_option_id')
                ->nullable()
                ->constrained('question_options')
                ->nullOnDelete();

            // Used if a question type is text, email, phone, etc.
            $table->text('answer_text')->nullable();
            $table->timestamps();

            // Only one saved answer for one question in one submission
            $table->unique(['submission_id', 'question_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submission_answers');
        Schema::dropIfExists('form_submissions');
        Schema::dropIfExists('question_options');
        Schema::dropIfExists('form_questions');
        Schema::dropIfExists('forms');
    }
};