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
        Schema::create('patient_appoinments', function (Blueprint $table) {
            $table->id();
            $table->date('appointment_date')->nullable();
            $table->time('appointment_time')->nullable();
            $table->enum('type',['Urgent','Normal'])->default('Normal');
            $table->enum('status',['pending','accepted','rejected'])->nullable();
            $table->longText('doctor_notes')->nullable();
            $table->longText('reason')->nullable();
            $table->foreignId('patient_id');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreignId('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_appoinments');
    }
};
