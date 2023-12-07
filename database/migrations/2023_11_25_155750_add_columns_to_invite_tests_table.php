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
        Schema::table('invite_tests', function (Blueprint $table) {
            $table->dropColumn('is_used');
            $table->integer('count_attempts')->default(0);
            $table->integer('count_minutes')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invite_tests', function (Blueprint $table) {
            $table->boolean('is_used')->default(false);
            $table->dropColumn('count_attempts');
            $table->dropColumn('count_minutes');
        });
    }
};
