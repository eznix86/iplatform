<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum OwnershipType: string
{
    use Enumerable;

    case LEASED = 'leased';
    case OWNED = 'owned';
    case FINANCED = 'financed';
}
