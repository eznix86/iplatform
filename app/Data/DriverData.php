<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class DriverData extends Data
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $date_of_birth,
        public string $gender,
        public string $marital_status,
        public string $license_number,
        public string $license_state,
        public string $license_status,
        public string $license_effective_date,
        public string $license_expiration_date,
        public string $license_class,
    ) {
    }
}
