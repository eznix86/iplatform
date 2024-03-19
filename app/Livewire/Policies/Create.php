<?php

namespace App\Livewire\Policies;

use App\Actions\Policy\CreatePolicy;
use App\Data\PolicyData;
use App\Enums\PolicyStatus;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public bool $policy_status = false;

    public $policy_effective_date;

    public $policy_expiration_date;

    public $policy_type;

    public $assign_users;

    public function mount()
    {
        $this->policy_effective_date = now()->toDateString();
        $this->policy_expiration_date = now()->addDay()->toDateString();
    }

    #[On('toggle-switch')]
    public function toggle()
    {
        $this->policy_status = ! $this->policy_status;
    }

    public function save()
    {
        $this->validate([
            'policy_effective_date' => 'required|date',
            'policy_expiration_date' => 'required|date|after:policy_effective_date',
            'policy_type' => 'required',
        ]);

        // Save the policy

        $policyData = [
            ...$this->only([
                'policy_effective_date',
                'policy_expiration_date',
                'policy_type',
            ]),
            'policy_status' => $this->policy_status ? PolicyStatus::ACTIVE->value : PolicyStatus::INACTIVE->value,
        ];

        $policy = (new CreatePolicy)->handle(PolicyData::from($policyData));

        $policy->users()->sync($this->assign_users);

        return redirect()
            ->route('policies.show', [
                'policy' => $policy->id,
            ])
            ->with('success', sprintf('Policy %s created successfully!', $policy->policy_no));

    }

    public function render()
    {
        return view('livewire.policies.create');
    }
}
