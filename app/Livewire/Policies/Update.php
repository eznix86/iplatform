<?php

namespace App\Livewire\Policies;

use App\Livewire\Forms\UpdatePolicyForm;
use App\Livewire\Forms\UpdatePolicyHolderForm;
use App\Models\Coverage;
use App\Models\Driver;
use App\Models\Policy;
use App\Models\Vehicle;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    public UpdatePolicyForm $policy_form;

    public UpdatePolicyHolderForm $policy_holder_form;

    public Policy $policy;

    public function mount(Policy $policy)
    {
        $this->policy = $policy;
        $this->policy_form->setPolicy($policy);
        $this->policy_holder_form->setPolicy($policy);

    }

    public function updatePolicy()
    {
        $this->policy_form->updatePolicy();

        session()->flash('message', 'Policy Updated Successfully.');

        return redirect()->route('policies.update', $this->policy);
    }

    public function updatePolicyHolder()
    {
        $this->policy_holder_form->updatePolicyHolder();

        session()->flash('message', 'Policy Holder Updated Successfully.');

        return redirect()->route('policies.update', $this->policy);
    }

    public function deleteDriver($id)
    {
        Driver::find($id)->delete();
        $this->dispatch('refresh');
    }

    public function deleteVehicle($id)
    {
        Vehicle::find($id)->delete();
        $this->dispatch('refresh');
    }

    public function deleteCoverage($id)
    {
        Coverage::find($id)->delete();
        $this->dispatch('refresh');
    }

    #[On('refresh')]
    public function render()
    {
        return view('livewire.policies.update');
    }
}
