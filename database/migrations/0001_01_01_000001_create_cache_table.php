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
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 191)->primary();
            $table->mediumText('value');
            $table->unsignedBigInteger('expiration'); 
            $table->index('expiration'); 
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 191)->primary(); 
            $table->string('owner');
            $table->unsignedBigInteger('expiration');
            $table->index('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};


