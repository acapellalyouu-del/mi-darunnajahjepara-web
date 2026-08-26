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
        Schema::table('teachers', function (Blueprint $table) {
            $table->text('quote')->nullable()->after('photo_path');
            $table->text('bio')->nullable()->after('quote');
            $table->text('education')->nullable()->after('bio');
            $table->text('experience')->nullable()->after('education');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn(['quote', 'bio', 'education', 'experience']);
        });
    }
};
