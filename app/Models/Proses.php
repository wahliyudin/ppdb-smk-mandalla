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
        'proses',
        'status',
    ];

    protected $casts = [
        'proses' => ProsesProses::class,
        'status' => Status::class,
    ];
}
