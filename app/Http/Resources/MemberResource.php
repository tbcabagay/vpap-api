<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_name' => $this->whenLoaded('profile')->first_name,
            'middle_name' => $this->whenLoaded('profile')->middle_name,
            'last_name' => $this->whenLoaded('profile')->last_name,
            'license_number' => (int) $this->whenLoaded('profession')->license_number,
            'email' => $this->email,
        ];
    }
}
