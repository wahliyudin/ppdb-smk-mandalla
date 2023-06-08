<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaPembayaran extends Model
{
    use HasFactory;

    protected $table = 'siswa_pembayaran';

    protected $fillable = [
        'siswa_id',
        'bukti',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
