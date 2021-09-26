<?php

namespace App\Http\Resources\Export;

use App\Models\VwWorkPlanDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $kro = VwWorkPlanDetail::where([['activity_id', $this->activity_id], ['admin_status', 'accept']])->groupBy('kro_id')->get();
        return [
            'activity_code' => $this->activity,
            'activity_description' => $this->activity_description,
            'kro' => KroResource::collection($kro)
        ];
    }
}
