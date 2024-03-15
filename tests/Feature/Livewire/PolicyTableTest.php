<?php

use App\Livewire\PolicyTable;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(PolicyTable::class)
        ->assertStatus(200);
});
