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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['job_seeker', 'business_man'])->default('job_seeker');
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('set null');
            $table->foreignId('education_level_id')->nullable()->constrained('education_levels')->onDelete('set null');
            $table->integer('work_experience')->default(0); // سنوات الخبرة
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropForeign(['education_level_id']);
            $table->dropColumn(['role', 'country_id', 'education_level_id', 'work_experience', 'phone', 'bio', 'profile_image']);
        });
    }
}; 