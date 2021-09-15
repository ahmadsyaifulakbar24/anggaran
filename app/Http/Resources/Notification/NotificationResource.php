<?php

namespace App\Http\Resources\Notification;

use App\Http\Resources\History\HistoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'work_plan' => [
                'id' => $this->work_plan->id,
                'title' => $this->work_plan->title,
            ],
            'history' => new HistoryResource($this->history),
            'created_by' => [
                'id' => $this->user_created->id,
                'name' => $this->user_created->name
            ],
            'sent_to' => [
                'id' => $this->user_sent_to->id,
                'name' => $this->user_sent_to->name,
            ],
            'type' => $this->type,
            'read' => $this->read,
            'created_at' => $this->created_at,
            'date_read' => $this->date_read,
        ];
    }
}
