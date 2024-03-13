<?php

use App\Actions\Coverage\AddCoverages;
use App\Data\CoverageData;
use App\Models\Vehicle;
use Illuminate\Support\Collection;

test('add coverage to vehicle test', function () {

    $vehicle = Vehicle::factory()->create();

    /** @var Collection $coverages */
    $coverages = CoverageData::collect([
        ['type' => 'liability', 'deductible' => 100000, 'limit' => 300000],
        ['type' => 'collision', 'deductible' => 500, 'limit' => 100000],
        ['type' => 'comprehensive', 'deductible' => 500, 'limit' => 100000],
    ], Collection::class);

    (new AddCoverages)->handle($vehicle, $coverages);

    expect($vehicle->coverages()->count())->toBe(3);
});
