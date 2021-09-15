<?php

namespace App\Http\Resources\Ro;

use Illuminate\Http\Resources\Json\JsonResource;

class RoResource extends JsonResource
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
            'code_ro' => $this->code_ro,
            'ro' => $this->ro
        ];
    }
}
