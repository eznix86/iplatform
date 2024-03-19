<?php

use App\Livewire\AddDriverPopUp;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(AddDriverPopUp::class)
        ->assertStatus(200);
});
