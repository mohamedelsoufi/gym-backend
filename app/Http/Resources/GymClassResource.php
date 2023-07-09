<?php

namespace App\Http\Resources;

use App\Models\Branch;
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
            "time" => date('h:i A', strtotime($this->time)),
            "days" => DaysResource::collection($this->days),
            "branches" => BranchResource::collection($this->branches)
        ];
    }
}
