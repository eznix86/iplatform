<?php

namespace App\Enums;

enum Permissions: string
{
    case CREATE_THIRD_PARTY_API_TOKEN = 'CREATE_THIRD_PARTY_API_TOKEN';
    case CREATE_PASSWORD_GRANT_TOKEN = 'CREATE_PASSWORD_GRANT_TOKEN';
}
