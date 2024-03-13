<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'vin' => $this->vin,
            'usage' => $this->usage,
            'primary_use' => $this->primary_use,
            'annual_mileage' => $this->annual_mileage,
            'ownership' => $this->ownership,
            'garaging_address' => new GaragingAddressResource($this->whenLoaded('garagingAddress')),
            'coverages' => CoverageResource::collection($this->whenLoaded('coverages')),
        ];
    }
}
