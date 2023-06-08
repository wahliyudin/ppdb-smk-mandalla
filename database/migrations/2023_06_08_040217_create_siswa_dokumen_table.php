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
        Schema::create('siswa_dokumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('ijazah');
            $table->string('kk');
            $table->string('kip')->nullable();
            $table->string('pkh')->nullable();
            $table->string('kks')->nullable();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_dokumen');
    }
};
