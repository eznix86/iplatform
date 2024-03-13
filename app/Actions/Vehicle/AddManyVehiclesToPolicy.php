<?php

namespace App\Actions\Vehicle;

use App\Actions\Coverage\AddCoverages;
use App\Models\Policy;
use App\Traits\HasMultipleData;
use Illuminate\Support\Collection;

class AddManyVehiclesToPolicy
{
    use HasMultipleData;

    public function handle(Policy $policy, Collection $vehicles)
    {
        $this->deleteExistingVehicles($policy);
        $createdVehicles = $this->createVehicles($policy, $vehicles);
        $this->createGaragingAddresses($createdVehicles, $vehicles);
        $this->createCoverage($createdVehicles, $vehicles);
    }

    private function deleteExistingVehicles(Policy $policy)
    {
        $policy->vehicles()->delete();
    }

    private function createVehicles(Policy $policy, Collection $vehicles)
    {
        return $policy->vehicles()->createMany($this->toArray($vehicles));
    }

    private function createGaragingAddresses(Collection $createdVehicles, Collection $vehicles)
    {
        foreach ($createdVehicles as $createdVehicle) {
            $vehicleData = $vehicles->firstWhere('vin', $createdVehicle->vin);
            $createdVehicle->garagingAddress()->create($vehicleData->garaging_address->toArray());
        }
    }

    private function createCoverage(Collection $createdVehicles, Collection $vehicles)
    {
        foreach ($createdVehicles as $createdVehicle) {
            $vehicleData = $vehicles->firstWhere('vin', $createdVehicle->vin);
            (new AddCoverages)->handle($createdVehicle, $vehicleData->coverages);
        }
    }
}
