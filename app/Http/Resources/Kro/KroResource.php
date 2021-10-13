<?php

namespace App\Http\Resources\Kro;

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
            'code_kro_non_pn' => $this->code_kro_non_pn,
            'code_kro_pn' => $this->code_kro_pn,
            'kro' => $this->kro,
            'unit' => $this->unit,
        ];
    }
}
