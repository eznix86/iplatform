<?php

namespace App\Actions\Policy;

use App\Data\PolicyData;
use App\Models\Policy;
use Closure;

class CreatePolicy
{
    public function run($content, Closure $next)
    {
        $policyData = $content[0];

        $policy = $this->handle($policyData);

        return $next([$policy, $content[1]]);
    }

    public function handle(PolicyData $data): Policy
    {
        $policy = Policy::create([
            ...$data->toArray(),
            'policy_no' => (new PolicyNumberGenerator)->handle(),
        ]);

        return $policy;
    }
}
