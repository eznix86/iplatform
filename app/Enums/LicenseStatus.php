<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum LicenseStatus: string
{
    use Enumerable;

    case VALID = 'valid';
    case SUSPENDED = 'suspended';
    case REVOKED = 'revoked';
    case EXPIRED = 'expired';
}
