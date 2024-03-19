<?php

namespace App\Livewire\Forms;

use App\Enums\PolicyStatus;
use App\Enums\PolicyType;
use App\Models\Policy;
use Illuminate\Validation\Rule;
use Livewire\Form;

class UpdatePolicyForm extends Form
{
    public ?Policy $policy;

    public $policy_type = '';

    public $policy_status = '';

    public $policy_effective_date = '';

    public $policy_expiration_date = '';

    public $assigned_users = '';

    public function setPolicy(Policy $policy)
    {
        $this->policy = $policy;
        $this->policy_type = $policy->policy_type;
        $this->policy_status = $policy->policy_status;
        $this->policy_effective_date = $policy->policy_effective_date->format('Y-m-d');
        $this->policy_expiration_date = $policy->policy_expiration_date->format('Y-m-d');
    }

    public function updatePolicy()
    {
        $this->validate([
            'policy_type' => [Rule::enum(PolicyType::class)],
            'policy_status' => [Rule::enum(PolicyStatus::class)],
            'policy_effective_date' => 'required|date',
            'policy_expiration_date' => 'required|date|after:policy_effective_date',
        ]);

        $this->policy->update($this->only('policy_type', 'policy_status', 'policy_effective_date', 'policy_expiration_date'));

        $this->policy->users()->sync($this->assigned_users);
    }
}
