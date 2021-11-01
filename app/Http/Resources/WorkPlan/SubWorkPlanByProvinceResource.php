<?php

namespace App\Http\Resources\WorkPlan;

use Illuminate\Http\Resources\Json\JsonResource;

class SubWorkPlanByProvinceResource extends JsonResource
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
            'province' => [
                'id' => $this->province->id,
                'province' => $this->province->province,
            ],
            'city' => [
                'id' => $this->city->id,
                'city' => $this->city->city,
            ],
            'work_plan' => new WorkPlanResource($this->work_plan),
        ];
    }
}
