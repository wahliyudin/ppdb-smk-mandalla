<?php

namespace App\Enums\Proses;

enum Status: int
{
    case MENUNGGU = 1;
    case VERIFIKASI = 2;
    case TOLAK = 3;
}
