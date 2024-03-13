<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Models\Policy;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Policy $policy)
    {
        return DriverResource::collection($policy->load('drivers')->drivers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverRequest $request, Policy $policy)
    {
        $driver = $policy->drivers()->create($request->validated());

        return new DriverResource($driver);
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy, Driver $driver)
    {
        return new DriverResource($driver);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, Policy $policy, Driver $driver)
    {
        $driver->update($request->validated());

        return new DriverResource($driver);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy, Driver $driver)
    {
        $driver->delete();

        return response()->noContent();
    }
}
