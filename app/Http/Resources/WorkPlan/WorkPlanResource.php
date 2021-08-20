<?php

namespace App\Http\Resources\WorkPlan;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkPlanResource extends JsonResource
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
            'program_id' => $this->program_id,
            'title' => $this->title,
            'total_target' => $this->total_target,
            'unit_target' => $this->unit_target,
            'budged' => $this->budged,
            'province' => [
                'id' => $this->province->id,
                'province' => $this->province->province,
            ],
            'city' => [
                'id' => $this->city->id,
                'city' => $this->city->city,
            ],
            'detail' => $this->detail,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
