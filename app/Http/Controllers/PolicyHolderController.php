<?php

namespace App\Http\Controllers;

use App\Actions\PolicyHolder\AddPolicyHolder;
use App\Actions\PolicyHolder\UpdatePolicyHolder;
use App\Data\PolicyHolderData;
use App\Http\Requests\StorePolicyHolderRequest;
use App\Http\Requests\UpdatePolicyHolderRequest;
use App\Http\Resources\PolicyHolderResource;
use App\Models\Policy;
use App\Models\PolicyHolder;

class PolicyHolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Policy $policy)
    {
        $foundPolicy = $policy->load(['policyHolder', 'policyHolder.address']);

        $foundPolicyHolder = $foundPolicy->policyHolder()->exists();

        if (! $foundPolicyHolder) {
            return response()->noContent();
        }

        return new PolicyHolderResource($foundPolicy->policyHolder);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePolicyHolderRequest $request, Policy $policy, PolicyHolder $policyHolder)
    {
        (new AddPolicyHolder)->handle($policy, PolicyHolderData::from($request->validated()));

        return new PolicyHolderResource($policy->load(['policyHolder', 'policyHolder.address'])->policyHolder);
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy, PolicyHolder $policyHolder)
    {
        return new PolicyHolderResource($policy->policyHolder()->findOrFail($policyHolder->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePolicyHolderRequest $request, Policy $policy, PolicyHolder $policyHolder)
    {
        (new UpdatePolicyHolder)->handle($policyHolder, PolicyHolderData::from($request->validated()));

        return new PolicyHolderResource($policyHolder->load('address'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy, PolicyHolder $policyHolder)
    {
        $policy->policyHolder()->findOrFail($policyHolder->id)->delete();

        return response()->noContent();
    }
}
