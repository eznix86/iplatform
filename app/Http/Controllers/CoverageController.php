<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoverageRequest;
use App\Http\Requests\UpdateCoverageRequest;
use App\Http\Resources\CoverageResource;
use App\Models\Coverage;
use App\Models\Vehicle;

class CoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vehicle $vehicle)
    {
        return CoverageResource::collection($vehicle->load('coverages')->coverages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoverageRequest $request, Vehicle $vehicle)
    {
        $coverage = $vehicle->coverages()->create($request->validated());

        return new CoverageResource($coverage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle, Coverage $coverage)
    {
        return new CoverageResource($vehicle->coverages()->findOrFail($coverage->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoverageRequest $request, Vehicle $vehicle, Coverage $coverage)
    {
        $vehicle->coverages()->findOrFail($coverage->id)->update($request->validated());

        return new CoverageResource($coverage->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle, Coverage $coverage)
    {
        $vehicle->coverages()->findOrFail($coverage->id)->delete();

        return response()->noContent();
    }
}
