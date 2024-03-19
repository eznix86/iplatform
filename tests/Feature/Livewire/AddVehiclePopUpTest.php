<?php

use App\Livewire\AddVehiclePopUp;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(AddVehiclePopUp::class)
        ->assertStatus(200);
});
