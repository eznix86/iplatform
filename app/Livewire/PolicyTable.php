<?php

namespace App\Livewire;

use App\Models\Policy; // Add the missing import statement for the Policy model
use Livewire\Component;
use Livewire\WithPagination;

class PolicyTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = $this->getQuery();

        return view('livewire.policy-table', [
            'policies' => $query->orderBy('policy_expiration_date', 'desc')->paginate(),
        ]);
    }

    private function getQuery()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $canViewAny = $user?->can('viewAny', Policy::class);

        $notEmptySearch = ! empty($this->search);

        if (! $canViewAny) {
            $query = $notEmptySearch ? Policy::search($this->search) : Policy::query();
        } else {
            $query = $notEmptySearch ? Policy::withoutGlobalScopes()->search($this->search) : Policy::withoutGlobalScopes();
        }

        return $query;
    }
}
