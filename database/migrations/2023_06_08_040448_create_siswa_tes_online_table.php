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
        Schema::create('siswa_tes_online', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->date('tgl_mulai')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->integer('total_benar')->nullable();
            $table->integer('total_salah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_tes_online');
    }
};