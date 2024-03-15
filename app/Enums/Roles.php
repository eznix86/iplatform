<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum Roles: string
{
    use Enumerable;

    // In charge of viewing their policies and their details
    case CUSTOMER = 'customer';
    // In charge of creating, updating, and deleting policies
    case POLICY_MAKER = 'policy_maker';
    // In charge of creating, updating, and deleting users & assign roles
    case SUPER_ADMIN = 'super_admin';
}
