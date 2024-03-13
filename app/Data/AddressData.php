<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class AddressData extends Data
{
    public function __construct(
        public string $street,
        public string $city,
        public string $state,
        public string $zip,
    ) {
    }
}
