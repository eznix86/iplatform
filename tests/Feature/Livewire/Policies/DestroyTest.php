<?php

use App\Livewire\Policies\Destroy;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Destroy::class)
        ->assertStatus(200);
});
