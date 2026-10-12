<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // doctors, pmu, nursing, technicians
            $table->string('name');           // Doctors & Medical Professionals
            $table->string('short_name');     // Doctors
            $table->string('tone_class')->default('c-navy'); // c-navy, c-teal, c-blue, c-red
            $table->string('icon')->default('bi-person-badge');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_categories');
    }
};

