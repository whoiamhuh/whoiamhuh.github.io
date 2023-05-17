<?php

namespace App\Enums;

enum TableLocation: string
{
    case Снаружи = 'inside';
    case Внутри = 'outside';
}