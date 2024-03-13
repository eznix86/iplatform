<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

trait HasMultipleData
{
    public function toArray(Collection $data): mixed
    {
        return $data->map(fn ($item) => $this->dataToArray($item));
    }

    private function dataToArray(Data $data)
    {
        return $data->toArray();
    }
}
