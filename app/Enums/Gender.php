<?php

namespace App\Enums;

use App\Concerns\Enumerable;

enum Gender: string
{
    use Enumerable;

    case MALE = 'male';
    case FEMALE = 'female';
    case OTHER = 'other';
}
