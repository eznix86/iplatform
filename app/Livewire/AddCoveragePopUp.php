<?php

namespace App\Livewire;

use App\Livewire\Forms\AddCoverageForm;
use App\Models\Vehicle;
use Livewire\Attributes\On;
use Livewire\Component;

class AddCoveragePopUp extends Component
{
    public $showModal = false;

    public AddCoverageForm $form;

    #[On('add-coverage-pop-up:show')]
    public function toggleModal($vehicleId)
    {
        $vehicle = Vehicle::find($vehicleId);
        $this->form->setVehicle($vehicle);
        $this->showModal = ! $this->showModal;
    }

    public function addCoverage()
    {
        $this->form->addCoverage();

        $this->showModal = false;

        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.add-coverage-pop-up');
    }
}
