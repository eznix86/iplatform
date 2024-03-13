<?php

namespace App\Actions\PolicyHolder;

use App\Data\PolicyHolderData;
use App\Models\Policy;

class AddPolicyHolder
{
    public function handle(Policy $policy, PolicyHolderData $policyHolderData)
    {
        $policy->policyHolder()->create($policyHolderData->toArray());
        $policy->policyHolder->address()->create($policyHolderData->address->toArray());
    }
}
