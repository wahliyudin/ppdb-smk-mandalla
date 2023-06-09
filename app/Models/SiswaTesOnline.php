<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaTesOnline extends Model
{
    use HasFactory;

    protected $table = 'siswa_tes_online';

    protected $fillable = [
        'siswa_id',
        'tgl_mulai',
        'jam_mulai',
        'tgl_selesai',
        'jam_selesai',
        'total_benar',
        'total_salah',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function tesOnlines()
    {
        return $this->belongsToMany(Soal::class, 'tes_online', 'siswa_tes_online_id', 'soal_id')->withPivot(['jawaban'])->withTimestamps();
    }
}
