<?php

namespace App\Livewire\Forms;

use App\Models\Policy;
use Livewire\Form;

class AddVehicleForm extends Form
{
    public ?Policy $policy;

    public $year = '';

    public $make = '';

    public $model = '';

    public $vin = '';

    public $usage = '';

    public $primary_use = '';

    public $annual_mileage = '';

    public $ownership = '';

    public $street = '';

    public $city = '';

    public $state = '';

    public $zip = '';

    public function setPolicy($policy)
    {
        $this->policy = $policy;
    }

    public function addVehicle()
    {
        $this->validate([
            'vin' => 'required',
            'year' => 'required|numeric|min:1900|max:'.(date('Y') + 1),
            'make' => 'required',
            'model' => 'required',
            'vin' => 'required',
            'usage' => 'required',
            'primary_use' => 'required',
            'annual_mileage' => 'required|numeric|min:0|max:1000000',
            'ownership' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $vehicle = $this->policy->vehicles()->create([
            'vin' => $this->vin,
            'year' => $this->year,
            'make' => $this->make,
            'model' => $this->model,
            'vin' => $this->vin,
            'usage' => $this->usage,
            'primary_use' => $this->primary_use,
            'annual_mileage' => $this->annual_mileage,
            'ownership' => $this->ownership,
        ]);

        $vehicle->garagingAddress()->create([
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);

        $this->reset();

    }
}
