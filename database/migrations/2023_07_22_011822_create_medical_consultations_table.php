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
        Schema::create('medical_consultations', function (Blueprint $table) {
            $table->id();
            $table->longText('message');
            $table->string('file')->nullable();
            $table->longText('reply_message');
            $table->string('reply_file')->nullable();
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
        Schema::dropIfExists('medical_consultations');
    }
};
