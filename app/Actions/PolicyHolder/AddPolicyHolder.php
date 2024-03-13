<?php

namespace App\Actions\PolicyHolder;

use App\Data\PolicyHolderData;
use App\Models\Policy;

class AddPolicyHolder
{
    public function run($content, \Closure $next)
    {
        $policy = $content[0];
        $policyHolderData = PolicyHolderData::from($content[1]['policy_holder']);

        $this->handle($policy, $policyHolderData);

        return $next($content);
    }

    public function handle(Policy $policy, PolicyHolderData $policyHolderData)
    {
        $policy->policyHolder()->delete();
        $policy->policyHolder()->create($policyHolderData->toArray());
        $policy->policyHolder->address()->create($policyHolderData->address->toArray());
    }
}
