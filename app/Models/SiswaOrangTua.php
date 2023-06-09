<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaOrangTua extends Model
{
    use HasFactory;

    protected $table = 'siswa_orang_tua';

    protected $fillable = [
        'siswa_id',
        'nama_ayah',
        'tempat_lahir_ayah',
        'pekerjaan_ayah',
        'tgl_lahir_ayah',
        'no_telp_ayah',
        'nama_ibu',
        'tempat_lahir_ibu',
        'pekerjaan_ibu',
        'tgl_lahir_ibu',
        'no_telp_ibu',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
