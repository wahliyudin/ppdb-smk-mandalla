<?php

namespace App\Enums;

enum Agama: int
{
    case ISLAM = 1;
    case KRISTEN_PROTESTAN = 2;
    case KRISTEN_KATOLIK = 3;
    case HINDU = 4;
    case BUDDHA = 5;
    case KHONGHUCU = 6;

    public function label()
    {
        return match ($this) {
            self::ISLAM => 'Islam',
            self::KRISTEN_PROTESTAN => 'Kristen Protestan',
            self::KRISTEN_KATOLIK => 'Kristen Katolik',
            self::HINDU => 'Hindu',
            self::BUDDHA => 'Buddha',
            self::KHONGHUCU => 'Khonghucu',
        };
    }
}
