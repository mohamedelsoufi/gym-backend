<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            "title" => $this->title,
            "sub_title" => $this->sub_title,
            "description" => $this->description,
        ];
    }
}
