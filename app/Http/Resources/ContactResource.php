<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" =>$this->id,
            "contact" =>$this->contact,
            "type" =>$this->type,
            "icon" =>$this->icon,
        ];
    }
}
