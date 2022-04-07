<?php

namespace App\Http\Resources\Export;

use App\Http\Resources\User\UserResource;
use App\Models\VwWorkPlanDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class RoResource extends JsonResource
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
            'user_kro_id' => $this->user_kro_id,
            'code_ro' => $this->code_ro,
            'ro' => $this->ro,
            'unit_target' => $this->unit_target_data,
            'unit' => $this->unit,
            'work_plan' => ComponentResource::collection($this->work_plan()->where('admin_status', 'accept')->get())
        ];
    }
}
