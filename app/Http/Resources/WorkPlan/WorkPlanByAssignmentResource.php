<?php

namespace App\Http\Resources\WorkPlan;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkPlanByAssignmentResource extends JsonResource
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
            'assignment' => [
                'id' => $this->assignment->id,
                'assignment' => $this->assignment->param
            ],
            'work_plan' => new WorkPlanResource($this->work_plan),
        ];
    }
}
