<?php

namespace App\Livewire\Forms;

use App\Models\Policy;
use Livewire\Form;

class AddDriverForm extends Form
{
    public ?Policy $policy;

    public $first_name = '';

    public $last_name = '';

    public $date_of_birth = '';

    public $gender = '';

    public $marital_status = '';

    public $license_number = '';

    public $license_state = '';

    public $license_status = '';

    public $license_effective_date = '';

    public $license_expiration_date = '';

    public $license_class = '';

    public function setPolicy(Policy $policy)
    {
        $this->policy = $policy;
    }

    public function addDriver()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'marital_status' => 'required',
            'license_number' => 'required',
            'license_state' => 'required',
            'license_status' => 'required',
            'license_effective_date' => 'required|date',
            'license_expiration_date' => 'required|date|after:license_effective_date',
            'license_class' => 'required',
        ]);

        /** @var \App\Models\Driver $driver */
        $this->policy->drivers()->create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'license_number' => $this->license_number,
            'license_state' => $this->license_state,
            'license_status' => $this->license_status,
            'license_effective_date' => $this->license_effective_date,
            'license_expiration_date' => $this->license_expiration_date,
            'license_class' => $this->license_class,
        ]);

        $this->reset();
    }
}
