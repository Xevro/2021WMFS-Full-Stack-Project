<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentLikeResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'student_id' => $this->student_id,
            'proposal' => new ProposalResource($this->proposal),
        ];
    }
}
