<?php

namespace App\Models;

use App\Enums\Proses\Proses as ProsesProses;
use App\Enums\Proses\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'proses',
        'status',
        'alasan',
    ];

    protected $casts = [
        'proses' => ProsesProses::class,
        'status' => Status::class,
    ];
}
