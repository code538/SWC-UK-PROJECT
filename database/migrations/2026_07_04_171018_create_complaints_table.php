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
        Schema::create('complaints', function (Blueprint $table) {

            $table->id();

            /*
            Organization Details
            */

            $table->string('organization_name')->nullable();

            $table->string('group_name')->nullable();

            /*
            Customer Information
            */

            $table->string('full_name');

            $table->string('email');

            $table->string('phone',30)->nullable();

            /*
            Complaint Type
            */

            $table->string('complaint_type');

            /*
            Complaint Description
            */

            $table->longText('description');

            /*
            Attachment
            */

            $table->string('attachment')->nullable();

          

            $table->enum('status',[

                'new',

                'under_review',

                'resolved',

                'rejected',

                'closed'

            ])->default('new');

            /*
            Admin Notes
            */

            $table->longText('admin_note')->nullable();

            /*
            Assigned Employee
            */

            $table->unsignedBigInteger('assigned_to')->nullable();

            /*
            Follow Up
            */

            $table->timestamp('follow_up_at')->nullable();

            /*
            Browser Information
            */

            $table->string('user_agent')->nullable();

            $table->timestamps();

            /*
            Foreign Key
            */

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
        Schema::dropIfExists('complaints');
    }
};