<?php

namespace App\Livewire;

use App\Livewire\Forms\AddDriverForm;
use App\Models\Policy;
use Livewire\Attributes\On;
use Livewire\Component;

class AddDriverPopUp extends Component
{
    public $showModal = false;

    public AddDriverForm $form;

    public function mount(Policy $policy)
    {
        $this->form->setPolicy($policy);
    }

    #[On('add-driver-pop-up:show')]
    public function toggleModal()
    {
        $this->showModal = ! $this->showModal;

    }

    public function addDriver()
    {
        $this->form->addDriver();
        $this->showModal = false;
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.add-driver-pop-up');
    }
}
