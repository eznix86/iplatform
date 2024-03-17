<?php

namespace App\Livewire\Policies;

use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public bool $enabled = false;

    #[On('toggle-switch')]
    public function toggle()
    {
        $this->enabled = ! $this->enabled;
    }

    public function save()
    {
        // Validate rules

    }

    public function render()
    {
        return view('livewire.policies.create');
    }
}
