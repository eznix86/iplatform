<?php

namespace App\Actions\Coverage;

use App\Data\CoverageData;
use App\Models\Vehicle;

class AddCoverage
{
    public function handle(Vehicle $vehicle, CoverageData $coverageData): void
    {
        $vehicle->coverages()->create($coverageData->toArray());
    }
}
