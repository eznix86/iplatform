<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CoverageData extends Data
{
    public function __construct(
        public string $type,
        public int $limit,
        public int $deductible,
    ) {
    }
}
