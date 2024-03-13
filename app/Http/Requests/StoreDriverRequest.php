<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'license_number' => 'required|string',
            'license_state' => 'required|string',
            'license_status' => 'required|string',
            'license_effective_date' => 'required|date',
            'license_expiration_date' => 'required|date',
            'license_class' => 'required|string',
        ];
    }
}
