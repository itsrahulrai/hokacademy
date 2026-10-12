<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country')->nullable();
            $table->string('profession_role')->nullable(); // Doctor, PMU, Nursing, Laser Tech, International Doctor, Other
            $table->string('program_name')->nullable();    // If enquiry from a specific course or contact page
            $table->text('message')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('status')->default('new');      // new, read, replied, archived
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};

