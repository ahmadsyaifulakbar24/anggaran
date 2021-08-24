<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name
            ],
            'comment' => $this->comment
        ];
    }
}
