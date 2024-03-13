<?php

namespace App\Actions\Driver;

use App\Models\Policy;
use App\Traits\HasMultipleData;
use Illuminate\Support\Collection;

class AddDrivers
{
    use HasMultipleData;

    public function handle(Policy $policy, Collection $driverData)
    {
        $policy->drivers()->delete();

        $policy->drivers()->createMany(
            $this->toArray($driverData)
        );
    }
}
