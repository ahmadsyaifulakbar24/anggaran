<?php

namespace App\Http\Resources\FileManager;

use App\Http\Resources\Param\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FileManagerResource extends JsonResource
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
            'work_plan_id' => $this->work_plan_id,
            'user_ro_id' => $this->user_ro_id,
            'file' => $this->file_url,
            'type' => new ParamResource($this->type),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
