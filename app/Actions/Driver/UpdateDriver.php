<?php

namespace App\Actions\Driver;

use App\Data\DriverData;
use App\Models\Driver;

class UpdateDriver
{
    public function handle(Driver $driver, DriverData $data)
    {
        $driver->update($data->toArray());
    }
}
