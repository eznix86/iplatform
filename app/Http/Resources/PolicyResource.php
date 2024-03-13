<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PolicyResource extends JsonResource
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
            'policy_no' => $this->policy_no,
            'policy_status' => $this->policy_status,
            'policy_type' => $this->policy_type,
            'policy_effective_date' => $this->policy_effective_date,
            'policy_expiration_date' => $this->policy_expiration_date,
            'policy_holder' => new PolicyHolderResource($this->whenLoaded('policyHolder')),
            'vehicles' => VehicleResource::collection($this->whenLoaded('vehicles')),
            'drivers' => DriverResource::collection($this->whenLoaded('drivers')),
        ];
    }
}
