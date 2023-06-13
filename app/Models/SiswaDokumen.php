<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaDokumen extends Model
{
    use HasFactory;

    protected $table = 'siswa_dokumen';

    protected $fillable = [
        'siswa_id',
        'ijazah',
        'ktp_orang_tua',
        'kip',
        'pkh',
        'kks',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
