<?php

namespace App\Enums;

enum Agama: int
{
    case ISLAM = 1;
    case KRISTEN = 2;

    public function label()
    {
        return match ($this) {
            self::ISLAM => 'Islam',
            self::KRISTEN => 'Kristen',
        };
    }
}
