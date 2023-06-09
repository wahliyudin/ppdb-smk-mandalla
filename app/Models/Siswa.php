<?php

namespace App\Models;

use App\Enums\JenisKelamin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'tgl_lahir',
        'tempat_lahir',
    ];

    protected $casts = [
        'jenis_kelamin' => JenisKelamin::class
    ];

    public function orangTua()
    {
        return $this->hasOne(SiswaOrangTua::class, 'siswa_id', 'id');
    }

    public function dokumen()
    {
        return $this->hasOne(SiswaDokumen::class, 'siswa_id', 'id');
    }

    public function identitas()
    {
        return $this->hasOne(SiswaIdentitas::class, 'siswa_id', 'id');
    }

    public function pembayaran()
    {
        return $this->hasOne(SiswaPembayaran::class, 'siswa_id', 'id');
    }

    public function tesOnline()
    {
        return $this->hasOne(SiswaTesOnline::class, 'siswa_id', 'id');
    }

    public function proses()
    {
        return $this->hasMany(Proses::class, 'siswa_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
