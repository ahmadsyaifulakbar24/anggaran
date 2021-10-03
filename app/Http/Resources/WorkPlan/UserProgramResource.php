<?php

namespace App\Http\Resources\WorkPlan;

use App\Http\Resources\Program\ProgramResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'program' => new ProgramResource($this->program),
        ];
    }
}
