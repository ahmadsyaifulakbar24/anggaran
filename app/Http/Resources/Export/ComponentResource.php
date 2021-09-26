<?php

namespace App\Http\Resources\Export;

use App\Http\Resources\WorkPlan\SubWorkPlanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ComponentResource extends JsonResource
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
            'component_code' => $this->compenent_code,
            'component' => $this->component,
            'title' => $this->title,
            'total_target' => $this->total_target,
            'unit_target' => $this->unit_target_name,
            'budged' => $this->budged,
            'province' => $this->province,
            'sub_work_plan' => [
                'city' => SubWorkPlanResource::collection($this->sub_work_plan)
            ],
            'detail' => $this->detail,
            'description' => $this->description,
            'asdep' => $this->user_name,
        ];
    }
}
