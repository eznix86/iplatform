<?php

namespace App\Livewire;

use App\Models\Policy;
use Livewire\Component;
use Livewire\WithPagination;

class PolicyTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = ! empty($this->search) ? Policy::search($this->search) : Policy::query();

        return view('livewire.policy-table', [
            'policies' => $query->orderBy('policy_expiration_date', 'desc')->paginate(),
        ]);
    }
}
