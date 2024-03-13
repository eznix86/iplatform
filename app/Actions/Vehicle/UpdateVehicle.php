<?php

namespace App\Actions\Vehicle;

use App\Data\VehicleData;
use App\Models\Vehicle;

class UpdateVehicle
{
    public function handle(Vehicle $vehicle, VehicleData $data)
    {
        $vehicle->update($data->toArray());
    }
}
