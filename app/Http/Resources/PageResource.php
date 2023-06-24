<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    public function toArray($request)
    {


        if ($this->identifier == 'video') {
            $data['id'] = $this->id;
            $data['identifier'] = $this->identifier;
            $data['image'] = $this->image;
            $data['video'] = $this->video;
        } else if ($this->identifier == 'our_classes'|| $this->identifier == 'our_package') {
            $data['id'] = $this->id;
            $data['identifier'] = $this->identifier;
            $data['title'] = $this->title;
            $data['description'] = $this->description;
        } else if ($this->identifier == 'branch_view') {
            $data['id'] = $this->id;
            $data['identifier'] = $this->identifier;
            $data['image'] = $this->image;
            $data['title'] = $this->title;
        } else if ($this->identifier == 'our_trainers' || $this->identifier == 'our_gallery') {
            $data['id'] = $this->id;
            $data['identifier'] = $this->identifier;
            $data['title'] = $this->title;
            $data['sub_title'] = $this->sub_title;
        } else {
            $data['id'] = $this->id;
            $data['identifier'] = $this->identifier;
            $data['image'] = $this->image;
            $data['title'] = $this->title;
            $data['description'] = $this->description;
        }

        return $data;
    }
}
