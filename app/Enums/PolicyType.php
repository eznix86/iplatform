<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum PolicyType: string
{
    use Enumerable;

    case AUTO = 'auto';
}
