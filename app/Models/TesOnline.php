<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesOnline extends Model
{
    use HasFactory;

    protected $table = 'tes_online';

    protected $fillable = [
        'siswa_tes_online_id',
        'user_id',
        'jawaban',
    ];
}
