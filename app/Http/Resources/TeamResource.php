<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "image" => $this->image,
            "name" => $this->name,
            "job_title" => $this->job_title,
            "facebook" => $this->facebook,
            "twitter" => $this->twitter,
            "instagram" => $this->instagram,
        ];
    }
}
