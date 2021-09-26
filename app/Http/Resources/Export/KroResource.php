<?php

namespace App\Http\Resources\Export;

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
        $ro = VwWorkPlanDetail::where([['kro_id', $this->kro_id], ['admin_status', 'accept']])->groupBy('ro')->get();
        return [
            'code_kro' => ($this->type_kro == 'code_kro_pn') ? $this->code_kro_pn : $this->code_kro_non_pn,
            'kro' => $this->kro,
            'ro' => RoResource::collection($ro)
        ];
    }
}
