<?php

namespace App\Http\Resources\Export;

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
        $component = VwWorkPlanDetail::where([['ro_id', $this->ro_id], ['admin_status', 'accept']])->get();
        return [
            'code_ro' => $this->code_ro,
            'ro' => $this->ro,
            'compenent' => ComponentResource::collection($component)
        ];
    }
}
