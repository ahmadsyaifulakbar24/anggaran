<?php

namespace App\Http\Resources\WorkPlan;

use App\Http\Resources\Program\ProgramResource;
use App\Http\Resources\Kro\KroResource;
use App\Http\Resources\Ro\RoResource;
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
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'unit' => [
                'id' => $this->unit->id,
                'name' => $this->unit->name,
            ],
            'program' => new ProgramResource($this->program),
            'unit_id' => $this->unit_id,
            'program_id' => $this->program_id,
            'type_kro' => $this->type_kro,
            'kro' => new KroResource($this->kro),
            'ro' => new RoResource($this->ro),
            'component_code' => $this->component_code,
            'component_name' => $this->component_name,
            'title' => $this->title,
            'total_target' => $this->total_target,
            'unit_target' => $this->unit_target_data,
            'budged' => $this->budged,
            'province' => [
                'id' => $this->province->id,
                'province' => $this->province->province,
            ],
            'sub_work_plan' => SubWorkPlanResource::collection($this->sub_work_plan),
            'detail' => $this->detail,
            'description' => $this->description,
            'deputi_status' => $this->deputi_status,
            'admin_status' => $this->admin_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
