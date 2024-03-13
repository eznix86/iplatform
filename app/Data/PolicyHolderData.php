<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class PolicyHolderData extends Data
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public AddressData $address,
    ) {
    }
}
