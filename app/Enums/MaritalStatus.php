<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum MaritalStatus: string
{
    use Enumerable;

    case MARRIED = 'married';
    case SINGLE = 'single';
    case DIVORCED = 'divorced';
    case WIDOWED = 'widowed';
}
