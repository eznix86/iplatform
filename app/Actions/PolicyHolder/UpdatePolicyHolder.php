<?php

namespace App\Actions\PolicyHolder;

use App\Data\PolicyHolderData;
use App\Models\PolicyHolder;

class UpdatePolicyHolder
{
    public function run($content, \Closure $next)
    {
        $policy = $content[0];
        $policyHolderData = PolicyHolderData::from($content[1]['policy_holder']);

        $this->handle($policy->policyHolder, $policyHolderData);

        return $next($content);
    }

    public function handle(PolicyHolder $policyHolder, PolicyHolderData $policyHolderData)
    {
        $policyHolder->update($policyHolderData->toArray());
        $policyHolder->address()->update($policyHolderData->address->toArray());
    }
}
