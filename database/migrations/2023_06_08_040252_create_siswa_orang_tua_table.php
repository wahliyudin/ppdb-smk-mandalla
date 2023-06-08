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
        Schema::create('siswa_orang_tua', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('nama_ayah');
            $table->string('tempat_lahir_ayah');
            $table->string('email_ayah')->nullable();
            $table->string('pekerjaan_ayah');
            $table->date('tgl_lahir_ayah');
            $table->string('no_telp_ayah')->nullable();
            $table->string('nama_ibu');
            $table->string('tempat_lahir_ibu');
            $table->string('email_ibu')->nullable();
            $table->string('pekerjaan_ibu');
            $table->date('tgl_lahir_ibu');
            $table->string('no_telp_ibu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_orang_tua');
    }
};