<?php

namespace App\Actions\Vehicle;

use App\Data\VehicleData;
use App\Models\Address;
use App\Models\Coverage;
use App\Models\Policy;
use App\Models\Vehicle;
use App\Traits\HasMultipleData;
use Closure;
use Illuminate\Support\Collection;

class AddManyVehiclesToPolicy
{
    use HasMultipleData;

    public function run($content, Closure $next)
    {
        $policy = $content[0];
        /** @var Collection $vehicles */
        $vehicles = VehicleData::collect($content[1]['vehicles'], Collection::class);

        $this->handle($policy, $vehicles);

        return $next($content);
    }

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
        $vehicleData = $this->toArray($vehicles);

        return $policy->vehicles()->createMany($vehicleData);
    }

    private function createGaragingAddresses(Collection $createdVehicles, Collection $vehicles)
    {
        $addAddresses = [];
        foreach ($createdVehicles as $createdVehicle) {
            $vehicleData = $vehicles->firstWhere('vin', $createdVehicle->vin);
            $addAddresses[] = $vehicleData->garaging_address->toArray() + [
                'addressable_id' => $createdVehicle->id,
                'addressable_type' => Vehicle::class,
            ];
        }

        Address::insert($addAddresses);
    }

    private function createCoverage(Collection $createdVehicles, Collection $vehicles)
    {
        $addCoverages = [];
        foreach ($createdVehicles as $createdVehicle) {
            $vehicleData = $vehicles->firstWhere('vin', $createdVehicle->vin);
            $coverages = $vehicleData->coverages->map(function ($coverage) use ($createdVehicle) {
                return $coverage->toArray() + ['vehicle_id' => $createdVehicle->id];
            })->toArray();
            $addCoverages = array_merge($addCoverages, $coverages);
        }

        Coverage::insert($addCoverages);
    }
}
