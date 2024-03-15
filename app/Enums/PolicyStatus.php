<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum PolicyStatus: string
{
    use Enumerable;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
