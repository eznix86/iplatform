<?php

namespace App\Livewire\Policies;

use App\Models\Policy;
use Livewire\Component;

class Show extends Component
{
    public $policy = null;

    public function mount(Policy $policy)
    {
        $this->policy = $policy;
    }

    public function render()
    {
        return view('livewire.policies.show', [
            'policy' => $this->policy,
        ]);
    }
}
