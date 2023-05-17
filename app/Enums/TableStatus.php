<?php

namespace App\Enums;

enum TableStatus: string
{
    case Свободен = 'avaliable';
    case Забронирован = 'unavaliable';
}