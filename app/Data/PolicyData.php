<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class PolicyData extends Data
{
    public function __construct(
        public string $policy_status,
        public string $policy_type,
        public string $policy_effective_date,
        public string $policy_expiration_date,
    ) {
    }
}
