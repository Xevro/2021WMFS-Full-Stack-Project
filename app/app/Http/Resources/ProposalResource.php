<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProposalResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'visibility' => $this->visibility,
            'status' => $this->status,
            'description' => $this->description,
            'start_period' => $this->start_period,
            'end_period' => $this->end_period,
            'contract_file_location' => $this->contract_file_location,
            'company' => new CompanyResource($this->company),
            'mentor' => new MentorResource($this->mentor),
        ];
    }
}
