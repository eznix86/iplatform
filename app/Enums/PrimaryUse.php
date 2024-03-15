<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum PrimaryUse: string
{
    use Enumerable;

    case COMMUTING = 'commuting';
    case COMMERCIAL = 'commercial';
}
