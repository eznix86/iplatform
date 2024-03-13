<?php

namespace App\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

class VehicleData extends Data
{
    public function __construct(
        public int $year,
        public string $make,
        public string $model,
        public string $vin,
        public string $usage,
        public string $primary_use,
        public int $annual_mileage,
        public string $ownership,
        public GaragingAddressData $garaging_address,
        /** @var Collection<int, \App\Data\CoverageData> */
        public Collection $coverages,
    ) {
    }
}
