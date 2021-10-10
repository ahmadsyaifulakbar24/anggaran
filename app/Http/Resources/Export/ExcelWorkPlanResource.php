<?php

namespace App\Http\Resources\Export;

use App\Http\Resources\Program\ProgramResource;
use App\Http\Resources\User\UserResource;
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
        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'unit' => $this->unit,
            'program' => new ProgramResource($this->program),
            'total_budged_user_activity' => VwWorkPlanDetail::where([['user_program_id', $request->id], ['admin_status', 'accept']])->sum('budged'),
            'user_activity' => ActivityResource::collection($this->user_activity),
        ];
    }
}
