<?php

use App\Actions\Vehicle\AddVehicles;
use App\Data\VehicleData;
use App\Models\Address;
use App\Models\Policy;
use Illuminate\Support\Collection;

test('add vehicles to policy', function () {
    $policy = Policy::factory()->create();

    $garagingAddress = Address::factory()->raw();
    /**
     * @var Collection $vehicles
     */
    $vehicles = VehicleData::collect(
        [
            [
                'year' => '2008',
                'make' => 'Toyota',
                'model' => 'Corolla',
                'vin' => '21213971',
                'usage' => 'Pleasure',
                'primary_use' => 'Personal',
                'annual_mileage' => 100000,
                'ownership' => 'Leased',
                'garaging_address' => $garagingAddress,
            ],

        ],
        Collection::class
    );

    (new AddVehicles)->handle($policy, $vehicles);

    expect($policy->vehicles()->count())->toBe(1);
    expect($policy->vehicles()->first()->garagingAddress->street == $garagingAddress['street'])->toBeTrue();
    $policy->delete();
});
