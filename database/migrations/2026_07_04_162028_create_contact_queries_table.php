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
        Schema::create('contact_queries', function (Blueprint $table) {

            $table->id();

            /*
            Customer Information
            */
            $table->string('full_name');

            $table->string('email');

            $table->string('phone', 30);

            /*
            Selected Service
            */
            $table->unsignedBigInteger('service_category_id')
                  ->nullable();

            $table->unsignedBigInteger('service_sub_category_id')
                  ->nullable();

            /*
            User Message
            */
            $table->longText('description')->nullable();

            /*
            Source
            Example:
            website
            mobile_app
            sponsor_page
            contact_page
            */
            $table->string('source')->nullable();

            /*
            Query Status
            */
            $table->enum('status', [

                'new',

                'in_progress',

                'contacted',

                'closed'

            ])->default('new');

            /*
            Admin Notes
            */
            $table->longText('admin_note')->nullable();

            /*
            Assigned Employee
            */
            $table->unsignedBigInteger('assigned_to')
                  ->nullable();

            /*
            Follow Up
            */
            $table->timestamp('follow_up_at')
                  ->nullable();


            $table->string('user_agent')
                  ->nullable();

            $table->timestamps();

            /*
            Foreign Keys
            */

            $table->foreign('service_category_id')
                  ->references('id')
                  ->on('service_categories')
                  ->nullOnDelete();

            $table->foreign('service_sub_category_id')
                  ->references('id')
                  ->on('service_sub_categories')
                  ->nullOnDelete();

            $table->foreign('assigned_to')
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_queries');
    }
};