<?php

namespace App\Actions\PolicyHolder;

use App\Data\PolicyHolderData;
use App\Models\PolicyHolder;

class UpdatePolicyHolder
{
    public function handle(PolicyHolder $policyHolder, PolicyHolderData $policyHolderData)
    {
        $policyHolder->update($policyHolderData->toArray());
        $policyHolder->address()->update($policyHolderData->address->toArray());
    }
}
