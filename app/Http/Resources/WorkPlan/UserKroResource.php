<?php

namespace App\Http\Resources\WorkPlan;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserKroResource extends JsonResource
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
            'user_activity_id' => $this->user_activiy_id,
            'kro' => $this->kro,
            'type_kro' => $this->type_kro,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
