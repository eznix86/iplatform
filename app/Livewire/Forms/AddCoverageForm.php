<?php

namespace App\Livewire\Forms;

use App\Enums\CoverageType;
use App\Models\Vehicle;
use Illuminate\Validation\Rule;
use Livewire\Form;

class AddCoverageForm extends Form
{
    public ?Vehicle $vehicle;

    public $limit = '';

    public $type = '';

    public $deductible = '';

    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function addCoverage()
    {
        $this->validate([
            'limit' => 'required|numeric|min:0|max:1000000',
            'type' => [
                'required',
                Rule::enum(CoverageType::class),
                Rule::unique('coverages', 'type')->where('vehicle_id', $this->vehicle->id),
            ],
            'deductible' => 'required|numeric|min:0|max:1000000',
        ]);

        $this->vehicle->coverages()->create([
            'limit' => $this->limit,
            'type' => $this->type,
            'deductible' => $this->deductible,
        ]);

    }
}
