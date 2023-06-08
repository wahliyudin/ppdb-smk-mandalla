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
        Schema::create('tes_online', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_tes_online_id');
            $table->unsignedBigInteger('soal_id');
            $table->enum('jawaban', ['a', 'b', 'c', 'd']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_online');
    }
};
