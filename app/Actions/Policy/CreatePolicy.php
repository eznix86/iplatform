<?php

namespace App\Actions\Policy;

use App\Data\PolicyData;
use App\Models\Policy;

class CreatePolicy
{
    public function handle(PolicyData $data): Policy
    {
        $policy = Policy::create([
            ...$data->toArray(),
            'policy_no' => (new PolicyNumberGenerator)->handle(),
        ]);

        $policy->save();

        return $policy;
    }
}
