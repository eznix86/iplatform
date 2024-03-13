<?php

use App\Actions\Policy\CreatePolicy;
use App\Data\PolicyData;
use App\Models\Policy;

test('create policy test', function () {

    $policyData = new PolicyData(
        policy_status: 'active',
        policy_type: 'auto',
        policy_effective_date: '2021-01-01',
        policy_expiration_date: '2022-01-01',
    );

    $policy = (new CreatePolicy)->handle($policyData);

    expect($policy->policy_status)->toBe('active');
    expect($policy->policy_type)->toBe('auto');
    expect($policy->policy_effective_date)->toBe('2021-01-01');
    expect($policy->policy_expiration_date)->toBe('2022-01-01');
    expect($policy->policy_no)->toBeString();
    expect($policy->policy_no)->toHaveLength(11);

    expect(Policy::where('policy_no', $policy->policy_no)->exists())->toBeTrue();
    $policy->delete();
});
