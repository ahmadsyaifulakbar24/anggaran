<?php

namespace App\Http\Resources\Program;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{

    public function toArray($request)
    {
        if($this->parent) {
            $parent = [
                'id' => $this->parent->id,
                'code_program' => $this->parent->code_program,
                'description' => $this->parent->description
            ];
        } else {
            $parent = NULL;
        }

        return [
            'id' => $this->id,
            'code_program' => $this->code_program,
            'parent' => $parent,
            'description' => $this->description,
            'created_by' => $this->created_by_data->name,
            'updated_by' => $this->updated_by_data->name,
            'unit' => ($this->unit) ? $this->unit->name : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
