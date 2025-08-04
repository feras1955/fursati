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
        Schema::table('jobs', function (Blueprint $table) {
            $table->text('requirements')->nullable()->after('description');
            $table->string('salary_range')->nullable()->after('salary_max');
            $table->string('job_type')->nullable()->after('salary_range');
            $table->text('skills')->nullable()->after('job_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['requirements', 'salary_range', 'job_type', 'skills']);
        });
    }
}; 