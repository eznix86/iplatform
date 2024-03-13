<?php

namespace App\Actions\Driver;

use App\Data\DriverData;
use App\Models\Driver;
use App\Models\Policy;
use App\Traits\HasMultipleData;
use Closure;
use Illuminate\Support\Collection;

class AddManyDriversToPolicy
{
    use HasMultipleData;

    public function run($content, Closure $next)
    {
        $policy = $content[0];
        /** @var Collection $driverData */
        $driverData = DriverData::collect($content[1]['drivers'], Collection::class);

        $this->handle($policy, $driverData);

        return $next($content);
    }

    public function handle(Policy $policy, Collection $driverData)
    {

        $policy->drivers()->delete();

        $data = $driverData->map(function ($driver) use ($policy) {
            return $driver->toArray() + ['policy_id' => $policy->id];
        });

        Driver::insert($data->toArray());
    }
}
