<?php

use App\Actions\Driver\AddDrivers;
use App\Data\DriverData;
use App\Models\Policy;
use Illuminate\Support\Collection;

test('add drivers to policy', function () {

    $policy = Policy::factory()->create();

    /** @var Collection $drivers */
    $drivers = DriverData::collect([
        [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'date_of_birth' => '1996-03-13',
            'marital_status' => 'single',
            'gender' => 'male',
            'license_number' => '123456',
            'license_state' => 'NY',
            'license_status' => 'active',
            'license_effective_date' => '2008-03-13',
            'license_expiration_date' => '2050-03-13',
            'license_class' => 'A',
        ],
    ], Collection::class);

    (new AddDrivers)->handle($policy, $drivers);

    expect($policy->drivers()->count())->toBe(1);
});
