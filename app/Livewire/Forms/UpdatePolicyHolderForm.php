<?php

namespace App\Livewire\Forms;

use App\Models\Policy;
use Livewire\Form;
use Str;

class UpdatePolicyHolderForm extends Form
{
    public ?Policy $policy;

    public $first_name = '';

    public $last_name = '';

    public $street = '';

    public $city = '';

    public $state = '';

    public $zip = '';

    public function setPolicy(Policy $policy)
    {
        $this->policy = $policy;
        $this->first_name = $policy->policyHolder->first_name ?? '';
        $this->last_name = $policy->policyHolder->last_name ?? '';
        $this->street = $policy->policyHolder->address->street ?? '';
        $this->city = $policy->policyHolder->address->city ?? '';
        $this->state = $policy->policyHolder->address->state ?? '';
        $this->zip = $policy->policyHolder->address->zip ?? '';
    }

    public function updatePolicyHolder()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        /** @var \App\Models\PolicyHolder $policyHolder */
        $policyHolder = $this->policy->policyHolder()->updateOrCreate([
            'policy_id' => $this->policy->id,
        ], [
            'first_name' => Str::ucfirst($this->first_name),
            'last_name' => Str::ucfirst($this->last_name),
        ]);

        $policyHolder->address()->updateOrCreate([
            'addressable_id' => $policyHolder->id,
            'addressable_type' => get_class($policyHolder),
        ], [
            'street' => Str::ucfirst($this->street),
            'city' => Str::ucfirst($this->city),
            'state' => $this->state,
            'zip' => $this->zip,
        ]);
    }
}
