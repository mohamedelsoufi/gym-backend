<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchPointResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description
        ];
    }
}
