<?php

namespace App\Http\Resources\WorkPlan;

use Illuminate\Http\Resources\Json\JsonResource;

class SubWorkPlanResource extends JsonResource
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
            'city' => [
                'id' => $this->city->id,
                'province_id' => $this->city->province_id,
                'city' => $this->city->city,
            ],
        ];
    }
}
