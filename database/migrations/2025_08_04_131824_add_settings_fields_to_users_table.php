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
            // إضافة الحقول المفقودة فقط (phone و bio موجودان بالفعل)
            $table->string('location')->nullable()->after('bio');
            $table->json('notification_settings')->nullable()->after('cv_path');
            $table->json('privacy_settings')->nullable()->after('notification_settings');
            $table->string('preferred_language', 5)->default('ar')->after('privacy_settings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'location',
                'notification_settings',
                'privacy_settings',
                'preferred_language'
            ]);
        });
    }
};
