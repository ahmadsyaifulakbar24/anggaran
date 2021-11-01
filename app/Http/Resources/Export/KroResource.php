<?php

namespace App\Http\Resources\Export;

use App\Http\Resources\User\UserResource;
use App\Models\VwWorkPlanDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class KroResource extends JsonResource
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
            'unit' => $this->unit,
            'user_activity_id' => $this->user_activiy_id,
            'kro' => $this->kro,
            'type_kro' => $this->type_kro,
            'total_budged_user_ro' => VwWorkPlanDetail::where([['user_kro_id', $request->id], ['admin_status', 'accept']])->sum('budged'),
            'user_ro' => RoResource::collection($this->user_ro),
        ];
    }
}
