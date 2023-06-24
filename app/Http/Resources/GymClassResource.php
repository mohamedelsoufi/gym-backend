<?php

namespace App\Http\Resources;

use App\Models\Page;
use Illuminate\Http\Resources\Json\JsonResource;

class GymClassResource extends JsonResource
{
    public function toArray($request)
    {
       return [
            "id" => $this->id,
            "image" => $this->image,
            "title" => $this->title,
            "time" => $this->time,
        ];
    }
}
