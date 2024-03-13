<?php

namespace App\Actions\Vehicle;

use App\Actions\Coverage\AddCoverages;
use App\Data\VehicleData;
use App\Models\Policy;

class AddVehicleToPolicy
{
    public function handle(Policy $policy, VehicleData $vehicle)
    {
        $policy->vehicles()->create($vehicle->toArray());
        /** @var \App\models\Vehicle $currentVehicle */
        $currentVehicle = $policy->vehicles()->where('vin', $vehicle->vin)->first();

        $currentVehicle->garagingAddress()->create($vehicle->garaging_address->toArray());

        (new AddCoverages)->handle($currentVehicle, $vehicle->coverages);
    }
}
