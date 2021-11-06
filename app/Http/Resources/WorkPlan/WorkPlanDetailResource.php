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
        $code_ro = $this->user_ro->code_ro;
        $code_kro = ($this->user_ro->user_kro->type_kro == 'pn') ? $this->user_ro->user_kro->kro->code_kro_pn : $this->user_ro->user_kro->kro->code_kro_non_pn;
        $code_activity = $this->user_ro->user_kro->user_activity->activity->code_program;
        $code_program = $this->user_ro->user_kro->user_activity->user_program->program->code_program;
        $all_kode = $code_program.'/'.$code_activity.'/'.$code_kro.'/'.$code_ro.'/'.$this->component_code;
        return [
            'all_kode' => $all_kode,
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
            'target_indicator_status' => $this->target_indicator_status,
            'target' => new ParamResource($this->target),
            'indicator' => new ParamResource($this->indicator),
            'pph7_status' => ($this->pph7_id == null) ? 0 : 1,
            'pph7' => new ParamResource($this->pph7),
            'deputi_status' => $this->deputi_status,
            'admin_status' => $this->admin_status,
            'sub_work_plan' => SubWorkPlanResource::collection($this->sub_work_plan),
            'assignment_status' => $this->assignment_status,
            'assignment' => AssignmentResource::collection($this->assignment),
            'source_funding' => SourceFundingResource::collection($this->source_funding),
            'permission' => $this->permission,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'file_manager' => FileManagerResource::collection($this->file_manager),
            'history' => HistoryResource::collection($this->history),
            'comment' => CommentResource::collection($this->comment),
        ];
    }
}
