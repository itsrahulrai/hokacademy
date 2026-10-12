<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('program_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('anchor')->nullable(); // anchor link from original code e.g. aesthetic-medicine, injectables
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->json('highlights')->nullable();
            $table->json('curriculum')->nullable();
            $table->string('duration')->nullable();
            $table->string('eligibility')->nullable();
            $table->string('certification')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

