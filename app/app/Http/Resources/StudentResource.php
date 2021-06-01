<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'r_number' => $this->r_number,
            'allowed' => $this->allowed,
            'approved' => $this->approved,
            'completed_days' => $this->completed_days,
            'proposal' => new ProposalResource($this->proposal),
            'mentor' => new MentorResource($this->mentor),
            'user' => new UserResource($this->user)
        ];
    }
}
