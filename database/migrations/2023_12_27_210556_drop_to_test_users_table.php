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
        Schema::drop('test_users');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('test_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('user_id');
            $table->float('score');
        });
    }
};
