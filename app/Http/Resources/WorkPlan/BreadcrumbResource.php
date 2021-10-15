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
            $breadcrumb = $data->code_program;
        } else if($breadcrumb_type == 'kro') {
            $data = $work_plan->where('user_activity_id_w', $this->user_activity_id)->first();
            $breadcrumb = $data->code_program.'/'.$data->user_activity_name;
        } else if($breadcrumb_type == 'ro') {
            $data = $work_plan->where('user_kro_id_w', $this->user_kro_id)->first();
            $code_kro = $data->type_kro == 'pn' ? $data->code_kro_pn : $data->code_kro_non_pn;
            $breadcrumb = $data->code_program.'/'.$data->code_activity.'/'.$code_kro;
        } else if($breadcrumb_type == 'work_plan') {
            $data = $work_plan->where('user_ro_id_w', $this->user_ro_id)->first();
            $breadcrumb = $data->code_program.'/'.$data->code_activity.'/'.$data->kro.'/'.$data->code_ro;
        }

        return [
            'breadcrumb' => $breadcrumb
        ];
    }
}
