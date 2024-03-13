<?php

namespace App\Actions\Driver;

use App\Data\DriverData;
use App\Models\Policy;

class AddDriver
{
    public function handle(Policy $policy, DriverData $driverData)
    {
        $policy->drivers()->create($driverData->toArray());
    }
}
