<?php

use App\Actions\Coverage\AddCoverage;
use App\Actions\Coverage\AddCoverages;
use App\Data\CoverageData;
use App\Models\Coverage;
use App\Models\Vehicle;
use Illuminate\Support\Collection;

test('add single coverage to vehicle', function () {

    $vehicle = Vehicle::factory()->withPolicy()->create();

    $coverage = CoverageData::from(Coverage::factory()->raw());

    (new AddCoverage)->handle($vehicle, $coverage);

    expect($vehicle->coverages()->count())->toBe(1);

});

test('add coverage to vehicle test', function () {

    $vehicle = Vehicle::factory()->withPolicy()->create();

    /** @var Collection $coverages */
    $coverages = CoverageData::collect([
        Coverage::factory()->raw(),
        Coverage::factory()->raw(),
        Coverage::factory()->raw(),
    ], Collection::class);

    (new AddCoverages)->handle($vehicle, $coverages);

    expect($vehicle->coverages()->count())->toBe(3);
});
