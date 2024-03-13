<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            // get age from date of birth
            'age' => (int) (new Carbon($this->date_of_birth))->diffInYears(now()),
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'license_number' => $this->license_number,
            'license_state' => $this->license_state,
            'license_status' => $this->license_status,
            'license_effective_date' => $this->license_effective_date,
            'license_expiration_date' => $this->license_expiration_date,
            'license_class' => $this->license_class,
        ];
    }
}
