<?php

namespace App\Http\Resources\WorkPlan;

use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\FileManager\FileManagerResource;
use App\Http\Resources\History\HistoryResource;
use App\Http\Resources\Kro\KroResource;
use App\Http\Resources\Ro\RoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkPlanDetailResource extends JsonResource
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
            'user_id' => $this->user_id,
            'unit_id' => $this->unit_id,
            'program_id' => $this->program_id,
            'kro' => new KroResource($this->kro),
            'ro' => new RoResource($this->ro),
            'component_code' => $this->compent_code,
            'component_name' => $this->component_name,
            'title' => $this->title,
            'total_target' => $this->total_target,
            'unit_target' => $this->unit_target,
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
            'file_manager' => FileManagerResource::collection($this->file_manager),
            'history' => HistoryResource::collection($this->history),
            'comment' => CommentResource::collection($this->comment),
        ];
    }
}
