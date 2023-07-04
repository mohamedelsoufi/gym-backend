<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    public function toArray($request)
    {
        $data["id"] = $this->id;
        $data["website_title"] = $this->website_title;
        $data["logo"] = $this->logo;
        $data["white_logo"] = $this->white_logo;
        $data["favicon"] = $this->favicon;
        $data["contact_img"] = $this->contact_img;
        $data["footer_img"] = $this->footer_img;
        $data["breadcrumb"] = $this->breadcrumb;
        $data["contact_email"] = $this->contact_email;
        $data["map"] = $this->map;
        $data["address"] = $this->address;
        $data["copyrights"] = $this->copyrights;
        $data["meta_keywords"] = $this->meta_keywords == null ? "" : $this->meta_keywords;
        $data["meta_title"] = $this->meta_title == null ? "" : $this->meta_title;
        $data["meta_description"] = $this->meta_description == null ? "" : $this->meta_description;
        $data["contacts"] = [
            "mobile" => ContactResource::collection($this->contact()->where('type', 'mobile')->get()),
            "email" => ContactResource::collection($this->contact()->where('type', 'email')->get()),
            "social" => ContactResource::collection($this->contact()->where('type', 'social')->get()),
        ];
        return $data;
    }
}
