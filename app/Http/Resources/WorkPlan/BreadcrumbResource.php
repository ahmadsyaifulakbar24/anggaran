<?php

namespace App\Http\Resources\WorkPlan;

use App\Models\VwWorkPlanDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class BreadcrumbResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $breadcrumb_type = $this->breadcrumb_type;
        $work_plan = VwWorkPlanDetail::query();
        if($breadcrumb_type == 'activity') {
            $data = $work_plan->where('id', $this->user_program_id)->first();
            $result = [
                'user_program' => [
                    'program_id' => $data->id,
                    'user_id' => $data->user_program_id,
                    'user_program_name' => $data->user_program_name,
                    'unit_id' => $data->unit_id,
                    'program_id' => $data->program_id,
                    'code_program' => $data->code_program,
                    'description' => $data->program_description,
                ]
            ];
        } else if($breadcrumb_type == 'kro') {
            $data = $work_plan->where('user_activity_id_w', $this->user_activity_id)->first();
            $result = [
                'user_program' => [
                    'user_program_id' => $data->id,
                    'user_id' => $data->user_program_id,
                    'user_name' => $data->user_program_name,
                    'unit_id' => $data->unit_id,
                    'program_id' => $data->program_id,
                    'code_program' => $data->code_program,
                    'description' => $data->program_description,
                ],
                'user_activity' => [
                    'user_activity_id' => $data->user_activity_id_w,
                    'user_id' => $data->user_activity_id,
                    'user_name' => $data->user_activity_name,
                    'activity_id' => $data->activity_id,
                    'code_activity' => $data->code_activity,
                    'description' => $data->activity_description,
                ]
            ];
        } else if($breadcrumb_type == 'ro') {
            $data = $work_plan->where('user_kro_id_w', $this->user_kro_id)->first();
            $result = [
                'user_program' => [
                    'user_program_id' => $data->id,
                    'user_id' => $data->user_program_id,
                    'user_name' => $data->user_program_name,
                    'unit_id' => $data->unit_id,
                    'program_id' => $data->program_id,
                    'code_program' => $data->code_program,
                    'description' => $data->program_description,
                ],
                'user_activity' => [
                    'user_activity_id' => $data->user_activity_id_w,
                    'user_id' => $data->user_activity_id,
                    'user_name' => $data->user_activity_name,
                    'activity_id' => $data->activity_id,
                    'code_activity' => $data->code_activity,
                    'description' => $data->activity_description,
                ],
                'user_kro' => [
                    'user_kro_id' => $data->user_kro_id_w,
                    'user_id' => $data->user_kro_id,
                    'user_name' => $data->user_kro_name,
                    'kro_id' => $data->kro_id,
                    'kro' => $data->kro,
                    'code_kro_non_pn' => $data->code_kro_non_pn,
                    'code_kro_pn' => $data->code_kro_pn,
                    'kro_unit' => $data->kro_unit,
                    'type_kro' => $data->type_kro,
                ]
            ];
        } else if($breadcrumb_type == 'work_plan') {
            $data = $work_plan->where('user_ro_id_w', $this->user_ro_id)->first();
            $result = [
                'user_program' => [
                    'user_program_id' => $data->id,
                    'user_id' => $data->user_program_id,
                    'user_name' => $data->user_program_name,
                    'unit_id' => $data->unit_id,
                    'program_id' => $data->program_id,
                    'code_program' => $data->code_program,
                    'description' => $data->program_description,
                ],
                'user_activity' => [
                    'user_activity_id' => $data->user_activity_id_w,
                    'user_id' => $data->user_activity_id,
                    'user_name' => $data->user_activity_name,
                    'activity_id' => $data->activity_id,
                    'code_activity' => $data->code_activity,
                    'description' => $data->activity_description,
                ],
                'user_kro' => [
                    'user_kro_id' => $data->user_kro_id_w,
                    'user_id' => $data->user_kro_id,
                    'user_name' => $data->user_kro_name,
                    'kro_id' => $data->kro_id,
                    'kro' => $data->kro,
                    'code_kro_non_pn' => $data->code_kro_non_pn,
                    'code_kro_pn' => $data->code_kro_pn,
                    'kro_unit' => $data->kro_unit,
                    'type_kro' => $data->type_kro,
                ],
                'user_ro' => [
                    'user_ro_id' => $data->user_ro_id_w,
                    'user_id' => $data->user_ro_id,
                    'user_name' => $data->user_ro_name,
                    'code_ro' => $data->code_ro,
                    'ro' => $data->ro
                ]
            ];
        }

        return $result;
    }
}
