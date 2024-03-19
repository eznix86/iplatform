<?php

use App\Livewire\AddCoveragePopUp;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(AddCoveragePopUp::class)
        ->assertStatus(200);
});
