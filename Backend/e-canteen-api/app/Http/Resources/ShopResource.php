<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this['id'],
            'user' => UserResource::make($this->whenLoaded('user')),
            'location' => ShopAddressResource::make($this->whenLoaded('location')) ,
            'name' => $this['name'],
            'slug' => $this['slug'],
            'image' => $this['image'],
            'is_open' => $this['is_open'],
        ];
    }
}
