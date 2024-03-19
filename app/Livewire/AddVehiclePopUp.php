<?php

namespace App\Livewire;

use App\Livewire\Forms\AddVehicleForm;
use App\Models\Policy;
use Livewire\Attributes\On;
use Livewire\Component;

class AddVehiclePopUp extends Component
{
    public $showModal = false;

    public ?Policy $policy;

    public AddVehicleForm $form;

    public function mount(Policy $policy)
    {
        $this->policy = $policy;
        $this->form->setPolicy($policy);
    }

    #[On('add-vehicle-pop-up:show')]
    public function toggleModal()
    {
        $this->showModal = ! $this->showModal;
    }

    public function addVehicle()
    {
        $this->form->addVehicle();

        $this->showModal = false;

        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.add-vehicle-pop-up');
    }
}
