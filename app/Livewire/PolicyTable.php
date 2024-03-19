<?php

namespace App\Livewire;

use App\Models\Policy; // Add the missing import statement for the Policy model
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
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

        $query = Policy::when($canViewAny, fn (EloquentBuilder $query) => $query->withoutGlobalScopes());

        if ($notEmptySearch) {
            $query = Policy::search($this->search)
                ->query(function ($builder) use ($canViewAny) {
                    if ($canViewAny) {
                        $builder->withoutGlobalScopes();
                    }
                });
        }

        return $query;
    }
}
