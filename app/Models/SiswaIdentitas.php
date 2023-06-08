<?php

namespace App\Models;

use App\Enums\Agama;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaIdentitas extends Model
{
    use HasFactory;

    protected $table = 'siswa_identitas';

    protected $fillable = [
        'siswa_id',
        'nisn',
        'nik',
        'jumlah_saudara',
        'anak_ke',
        'agama',
        'suku',
        'asal_sekolah',
        'no_ijazah',
        'berat_badan',
        'tinggi_badan',
        'riwayat_penyakit',
    ];

    protected $casts = [
        'agama' => Agama::class
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
