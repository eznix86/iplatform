<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum CoverageType: string
{
    use Enumerable;

    case LIABILITY = 'liability';
    case COLLISION = 'collision';
    case COMPREHENSIVE = 'comprehensive';
}
