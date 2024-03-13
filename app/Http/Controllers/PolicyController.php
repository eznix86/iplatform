<?php

namespace App\Http\Controllers;

use App\Actions\Driver\AddManyDriversToPolicy;
use App\Actions\Policy\CreatePolicy;
use App\Actions\PolicyHolder\AddPolicyHolder;
use App\Actions\PolicyHolder\UpdatePolicyHolder;
use App\Actions\Vehicle\AddManyVehiclesToPolicy;
use App\Data\PolicyData;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Http\Resources\PolicyResource;
use App\Models\Policy;
use Illuminate\Pipeline\Pipeline;

class PolicyController extends Controller
{
    private $eagerLoad = [
        'policyHolder',
        'policyHolder.address',
        'vehicles',
        'drivers',
        'vehicles.coverages',
        'vehicles.garagingAddress',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PolicyResource::collection(Policy::with($this->eagerLoad)->paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePolicyRequest $request)
    {
        return app(Pipeline::class)
            ->send([PolicyData::from($request->validated()), $request->validated()])
            ->via('run')
            ->through([
                CreatePolicy::class,
                AddPolicyHolder::class,
                AddManyDriversToPolicy::class,
                AddManyVehiclesToPolicy::class,
            ])
            ->then(
                fn ($data) => PolicyResource::make(
                    $data[0]->load($this->eagerLoad)
                )
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy)
    {
        return PolicyResource::make(
            $policy->load($this->eagerLoad));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePolicyRequest $request, Policy $policy)
    {
        /** @var Pipeline $pipeline */
        $pipeline = app(Pipeline::class);

        return $pipeline
            ->send([$policy->load($this->eagerLoad), $request->validated(), $policy])
            ->via('run')
            ->through([
                UpdatePolicyHolder::class,
                AddManyDriversToPolicy::class,
                AddManyVehiclesToPolicy::class,
            ])
            ->then(
                fn ($data) => PolicyResource::make(
                    $data[0]
                ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy)
    {
        $policy->delete();

        return response()->noContent();
    }
}
