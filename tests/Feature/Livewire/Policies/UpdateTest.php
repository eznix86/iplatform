<?php

use App\Livewire\Policies\Update;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Update::class)
        ->assertStatus(200);
});
