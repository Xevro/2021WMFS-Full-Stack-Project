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
            'kbo_number' => $this->kbo_number,
            'name' => $this->name,
            'user' => new UserResource($this->user)
        ];
    }
}
