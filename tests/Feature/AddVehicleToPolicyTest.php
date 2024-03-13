<?php

use App\Actions\Vehicle\AddManyVehiclesToPolicy;
use App\Actions\Vehicle\AddVehicleToPolicy;
use App\Data\VehicleData;
use App\Models\Address;
use App\Models\Coverage;
use App\Models\Policy;
use App\Models\Vehicle;
use Illuminate\Support\Collection;

test('add single vehicle to policy', function () {
    $policy = Policy::factory()->create();

    $garagingAddress = Address::factory()->raw();
    $coverage = Coverage::factory()->raw();

    $vehicle = VehicleData::from([
        ...Vehicle::factory()->raw(),
        'garaging_address' => $garagingAddress,
        'coverages' => [
            $coverage,
        ],
    ]);

    (new AddVehicleToPolicy)->handle($policy, $vehicle);

    expect($policy->vehicles()->count())->toBe(1);
    expect($policy->vehicles()->first()->garagingAddress->street == $garagingAddress['street'])->toBeTrue();
    expect($policy->vehicles()->first()->coverages()->count())->toBe(1);
});

test('add vehicles to policy', function () {
    $policy = Policy::factory()->create();

    $garagingAddress = Address::factory()->raw();
    $coverage = Coverage::factory()->raw();
    /**
     * @var Collection $vehicles
     */
    $vehicles = VehicleData::collect(
        [
            [
                ...Vehicle::factory()->raw(),
                'garaging_address' => $garagingAddress,
                'coverages' => Collection::make([$coverage]),
            ],

        ],
        Collection::class
    );

    (new AddManyVehiclesToPolicy)->handle($policy, $vehicles);

    expect($policy->vehicles()->count())->toBe(1);
    expect($policy->vehicles()->first()->garagingAddress->street == $garagingAddress['street'])->toBeTrue();
    expect($policy->vehicles()->first()->coverages()->count())->toBe(1);
    $policy->delete();
});
