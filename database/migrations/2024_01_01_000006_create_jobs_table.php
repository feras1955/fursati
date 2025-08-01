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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('work_place');
            $table->enum('gender_preference', ['male', 'female', 'all'])->default('all');
            $table->foreignId('education_level_id')->constrained('education_levels')->onDelete('cascade');
            $table->integer('work_experience'); // سنوات الخبرة المطلوبة
            $table->foreignId('work_field_id')->constrained('work_fields')->onDelete('cascade');
            $table->foreignId('country_of_graduation')->constrained('countries')->onDelete('cascade');
            $table->foreignId('country_of_residence')->constrained('countries')->onDelete('cascade');
            $table->foreignId('business_man_id')->constrained('users')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->enum('status', ['active', 'inactive', 'closed'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
}; 