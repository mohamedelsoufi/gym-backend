<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "duration" => $this->duration,
            "date" => $this->date,
            "from" => $this->from,
            "to" => $this->to,
            "created_at" => $this->created_at,
        ];
    }
}
