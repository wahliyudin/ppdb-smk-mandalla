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
        Schema::create('siswa_identitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('nisn');
            $table->string('nik');
            $table->integer('jumlah_saudara');
            $table->integer('anak_ke');
            $table->integer('dari');
            $table->enum('agama', [1, 2, 3, 4, 5, 6]);
            $table->string('suku');
            $table->string('asal_sekolah');
            $table->string('no_ijazah');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->string('riwayat_penyakit');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_identitas');
    }
};
