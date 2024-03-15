<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum LicenseClass: string
{
    use Enumerable;

    case A = 'a';
    case B = 'b';
    case C = 'c';
    case D = 'd';
    case E = 'e';
    case M = 'm';
}
