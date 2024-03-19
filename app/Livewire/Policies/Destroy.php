<?php

namespace App\Livewire\Policies;

use App\Models\Policy;
use Livewire\Component;

class Destroy extends Component
{
    public Policy $policy;

    public function mount(Policy $policy)
    {
        $this->policy = $policy;
    }

    public function delete()
    {
        $this->policy->delete();

        return redirect()->route('dashboard')->with(
            'success',
            sprintf('Policy %s deleted successfully!', $this->policy->policy_no)
        );
    }

    public function render()
    {
        return view('livewire.policies.destroy');
    }
}
