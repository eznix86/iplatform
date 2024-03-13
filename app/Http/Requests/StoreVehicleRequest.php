<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'year' => 'required|integer',
            'make' => 'required|string',
            'model' => 'required|string',
            'vin' => 'required|string',
            'usage' => 'required|string',
            'primary_use' => 'required|string',
            'annual_mileage' => 'required|integer',
            'ownership' => 'required|string',
            'garaging_address' => 'required|array',
            'garaging_address.street' => 'required|string',
            'garaging_address.city' => 'required|string',
            'garaging_address.state' => 'required|string',
            'garaging_address.zip' => 'required|string',
            'coverages' => 'required|array',
            'coverages.*.type' => 'required|string',
            'coverages.*.limit' => 'required|integer',
            'coverages.*.deductible' => 'required|integer',
        ];
    }
}
