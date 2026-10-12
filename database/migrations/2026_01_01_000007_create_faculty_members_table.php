<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faculty_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation'); // Qualification — Aesthetic Physician
            $table->string('speciality')->nullable(); // Aesthetic Medicine
            $table->string('tag')->nullable(); // e.g. "Aesthetic Medicine", "Laser & Energy", "Hair Restoration"
            $table->string('tone_class')->default('c-navy'); // c-blue, c-teal, c-navy, c-red
            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->json('skills_chips')->nullable(); // JSON array of tags e.g. ["Facial Aesthetics", "Injectables"]
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visiting')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faculty_members');
    }
};

