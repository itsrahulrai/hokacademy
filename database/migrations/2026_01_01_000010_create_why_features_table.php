<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('why_features', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('why_hok'); // why_hok, philosophy, discipline, vision_goal, mission_goal
            $table->string('anchor_id')->nullable();    // e.g. scientific, reasoning, practical, case, safety, development
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('strong_text')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->default('bi-check-circle');
            $table->string('tone_class')->default('c-navy'); // c-navy, c-teal, c-blue, c-red
            $table->json('chips')->nullable(); // list of tags / bullets
            $table->boolean('is_wide')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('why_features');
    }
};

