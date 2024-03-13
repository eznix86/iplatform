<?php

use App\Actions\PolicyHolder\AddPolicyHolder;
use App\Data\AddressData;
use App\Data\PolicyHolderData;
use App\Models\Policy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

test('create policy holder', function () {
    $policy = Policy::factory()->create();

    $policyHolderData = new PolicyHolderData(
        first_name: 'John',
        last_name: 'Doe',
        address: new AddressData(
            street: '123 Main St',
            city: 'Anytown',
            state: 'NY',
            zip: '12345',
        ),
    );

    (new AddPolicyHolder)->handle($policy, $policyHolderData);

    expect($policy->policyHolder()->count())->toBe(1);
    // check if address has been added
    expect($policy->policyHolder->address->street)->toBe('123 Main St');

});
