<?php

namespace App\Http\Resources\WorkPlan;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'user_kro_id' => $this->user_kro_id,
            'code_ro' => $this->code_ro,
            'ro' => $this->ro,
            'unit_target' => $this->unit_target_data,
            'unit' => $this->unit,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
