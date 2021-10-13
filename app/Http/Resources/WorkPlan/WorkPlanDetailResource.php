<?php

namespace App\Http\Resources\WorkPlan;

use App\Http\Resources\FileManager\FileManagerResource;
use App\Http\Resources\History\HistoryResource;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Param\ParamResource;
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
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'unit' => [
                'id' => $this->unit->id,
                'name' => $this->unit->name,
            ],
            'user_ro' => new UserRoResource($this->user_ro),
            'component_code' => $this->component_code,
            'component_name' => $this->component_name,
            'total_target' => $this->total_target,
            'unit_target' => $this->unit_target_data,
            'budged' => $this->budged,
            'detail' => $this->detail,
            'description' => $this->description,
            'target' => new ParamResource($this->target),
            'indicator' => new ParamResource($this->indicator),
            'deputi_status' => $this->deputi_status,
            'admin_status' => $this->admin_status,
            'sub_work_plan' => SubWorkPlanResource::collection($this->sub_work_plan),
            'source_funding' => SourceFundingResource::collection($this->source_funding),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'file_manager' => FileManagerResource::collection($this->file_manager),
            'history' => HistoryResource::collection($this->history),
            'comment' => CommentResource::collection($this->comment),
        ];
    }
}
