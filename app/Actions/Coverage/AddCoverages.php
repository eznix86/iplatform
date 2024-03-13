<?php

namespace App\Actions\Coverage;

use App\Models\Vehicle;
use App\Traits\HasMultipleData;
use Illuminate\Support\Collection;

class AddCoverages
{
    use HasMultipleData;

    public function handle(Vehicle $vehicle, Collection $coverages): void
    {
        $vehicle->coverages()->delete();

        $vehicle->coverages()->createMany($this->toArray($coverages));
    }
}
