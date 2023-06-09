<?php

namespace App\Enums;

enum Jawaban: string
{
    case PILIHAN_A = 'a';
    case PILIHAN_B = 'b';
    case PILIHAN_C = 'c';
    case PILIHAN_D = 'd';

    public function label()
    {
        return match ($this) {
            self::PILIHAN_A => 'A',
            self::PILIHAN_B => 'B',
            self::PILIHAN_C => 'C',
            self::PILIHAN_D => 'D',
        };
    }
}