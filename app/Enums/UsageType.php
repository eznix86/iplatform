<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum UsageType: string
{
    use Enumerable;

    case PLEASURE = 'pleasure';
    case BUSINESS = 'business';
}
