<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePolicyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'policy_status' => 'required|string',
            'policy_type' => 'required|string',
            'policy_effective_date' => 'required|date',
            'policy_expiration_date' => 'required|date',
            'vehicles' => 'required|array',
            'policy_holder' => 'required|array',
            'policy_holder.first_name' => 'required|string',
            'policy_holder.last_name' => 'required|string',
            'policy_holder.address.street' => 'required|string',
            'policy_holder.address.city' => 'required|string',
            'policy_holder.address.state' => 'required|string',
            'policy_holder.address.zip' => 'required|string',
            'drivers' => 'required|array',
            'drivers.*.first_name' => 'required|string',
            'drivers.*.last_name' => 'required|string',
            'drivers.*.date_of_birth' => 'required|date',
            'drivers.*.gender' => 'required|string',
            'drivers.*.marital_status' => 'required|string',
            'drivers.*.license_number' => 'required|string',
            'drivers.*.license_state' => 'required|string',
            'drivers.*.license_status' => 'required|string',
            'drivers.*.license_effective_date' => 'required|date',
            'drivers.*.license_expiration_date' => 'required|date',
            'drivers.*.license_class' => 'required|string',
            'vehicles.*.year' => 'required|integer',
            'vehicles.*.make' => 'required|string',
            'vehicles.*.model' => 'required|string',
            'vehicles.*.vin' => 'required|string',
            'vehicles.*.usage' => 'required|string',
            'vehicles.*.primary_use' => 'required|string',
            'vehicles.*.annual_mileage' => 'required|integer',
            'vehicles.*.ownership' => 'required|string',
            'vehicles.*.garaging_address' => 'required|array',
            'vehicles.*.garaging_address.street' => 'required|string',
            'vehicles.*.garaging_address.city' => 'required|string',
            'vehicles.*.garaging_address.state' => 'required|string',
            'vehicles.*.garaging_address.zip' => 'required|string',
            'vehicles.*.coverages' => 'required|array',
            'vehicles.*.coverages.*.type' => 'required|string',
            'vehicles.*.coverages.*.limit' => 'required|integer',
            'vehicles.*.coverages.*.deductible' => 'required|integer',
        ];
    }
}
