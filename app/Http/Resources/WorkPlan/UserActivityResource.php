<?php

namespace App\Http\Resources\WorkPlan;

use App\Http\Resources\Program\ProgramResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserActivityResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'unit' => $this->unit,
            'user_program_id' => $this->user_program_id,
            'activity' => new ProgramResource($this->activity),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
