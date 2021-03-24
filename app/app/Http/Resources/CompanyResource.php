<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'kbo_number' => $this->kbo_number,
            'name' => $this->name,
            'start_period' => $this->start_period,
            'user' => new UserResource($this->user)
        ];
    }
}
