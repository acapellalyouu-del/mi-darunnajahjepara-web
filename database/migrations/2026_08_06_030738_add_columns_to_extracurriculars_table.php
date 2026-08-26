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
        Schema::table('extracurriculars', function (Blueprint $table) {
            $table->string('category')->nullable()->after('description');
            $table->string('coach_role')->nullable()->after('coach_name');
            $table->string('coach_photo_path')->nullable()->after('coach_role');
            $table->string('location')->nullable()->after('schedule');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('extracurriculars', function (Blueprint $table) {
            $table->dropColumn(['category', 'coach_role', 'coach_photo_path', 'location']);
        });
    }
};
