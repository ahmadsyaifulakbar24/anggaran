<?php

namespace App\Http\Resources\Export;

use App\Models\VwWorkPlanDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class ExcelWorkPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $activity = VwWorkPlanDetail::where([['program_id', $this->program_id], ['admin_status', 'accept']])->groupBy('activity_id')->get();
        return [
            'program_code' => $this->program,
            'program_description' => $this->program_description,
            'activity' => ActivityResource::collection($activity)
        ];
    }
}
