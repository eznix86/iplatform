<?php

namespace App\Http\Controllers;

use App\Actions\Vehicle\AddVehicleToPolicy;
use App\Actions\Vehicle\UpdateVehicle;
use App\Data\VehicleData;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Policy;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Policy $policy)
    {
        return VehicleResource::collection($policy->load(['vehicles', 'vehicles.garagingAddress', 'vehicles.coverages'])->vehicles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request, Policy $policy)
    {
        $vehicle = (new AddVehicleToPolicy)->handle($policy, VehicleData::from($request->validated()));

        return new VehicleResource($vehicle->load(['garagingAddress', 'coverages']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy, Vehicle $vehicle)
    {
        return new VehicleResource($vehicle->load(['garagingAddress', 'coverages']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Policy $policy, Vehicle $vehicle)
    {
        (new UpdateVehicle)->handle($vehicle, VehicleData::from($request->validated()));

        return new VehicleResource($vehicle->load(['garagingAddress', 'coverages']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy, Vehicle $vehicle)
    {
        $policy->vehicles()->findOrFail($vehicle->id)->delete();

        return response()->noContent();
    }
}
