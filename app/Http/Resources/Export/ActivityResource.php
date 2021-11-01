<?php

namespace App\Http\Resources\Export;

use App\Http\Resources\Program\ProgramResource;
use App\Http\Resources\User\UserResource;
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
        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'unit' => $this->unit,
            'user_program_id' => $this->user_program_id,
            'activity' => new ProgramResource($this->activity),
            'total_budged_user_kro' => VwWorkPlanDetail::where([['user_activity_id', $request->id], ['admin_status', 'accept']])->sum('budged'),
            'user_kro' => KroResource::collection($this->user_kro),
        ];
    }
}
