<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username' => $this->username,
            'name' => $this->name,
            'unit_id' => $this->unit_id,
            'role' => $this->getRoleNames()[0],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
