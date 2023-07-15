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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('phone_number');
            $table->enum('gender',['male','female']);
            $table->string('date_of_birth');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('main_patient_file')->nullable();
            $table->enum('section', ['unclassified','Oncology', 'Radiation Oncology', 'Surgical Oncology', 'Pediatric Oncology', 'Hematology'])->default('unclassified');
            $table->enum('degrees_of_severity',['Mild', 'Moderate', 'Severe']);
            $table->string('diagnosis');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
