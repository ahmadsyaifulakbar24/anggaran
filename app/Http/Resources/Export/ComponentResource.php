<?php

namespace App\Http\Resources\Export;

use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\WorkPlan\AssignmentResource;
use App\Http\Resources\WorkPlan\SourceFundingResource;
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
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'unit' => [
                'id' => $this->unit->id,
                'name' => $this->unit->name,
            ],
            'component_code' => $this->component_code,
            'component_name' => $this->component_name,
            'title' => $this->title,
            'total_target' => $this->total_target,
            'unit_target' => $this->unit_target_data,
            'budged' => $this->budged,
            'detail' => $this->detail,
            'description' => $this->description,
            'target' => new ParamResource($this->target),
            'indicator' => new ParamResource($this->indicator),
            'sub_work_plan' => SubWorkPlanResource::collection($this->sub_work_plan),
            'source_funding' => SourceFundingResource::collection($this->source_funding),
            'pph7_status' => ($this->pph7_id == null) ? 0 : 1,
            'pph7' => new ParamResource($this->pph7),
            'assignment_status' => $this->assignment_status,
            'assignment' => AssignmentResource::collection($this->assignment),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
