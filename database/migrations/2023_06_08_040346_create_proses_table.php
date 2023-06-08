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
        Schema::create('proses', function (Blueprint $table) {
            $table->id();
            $table->string('kode_siswa');
            $table->enum('proses', [1, 2, 3]);
            $table->enum('status', [1, 2, 3]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses');
    }
};
