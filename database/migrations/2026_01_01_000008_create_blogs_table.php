<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category_tag')->default('Aesthetic Medicine'); // Aesthetic Medicine, Patient Safety, International, etc.
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable(); // HTML or block format
            $table->string('featured_image')->nullable();
            $table->integer('read_time')->default(5); // in minutes
            $table->date('published_at')->nullable();
            $table->boolean('is_published')->default(true);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

