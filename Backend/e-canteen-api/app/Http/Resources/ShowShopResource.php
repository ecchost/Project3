<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowShopResource extends JsonResource
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
            'name' => $this['name'],
            'slug' => $this['slug'],
            'image' => $this['image'],
            'is_open' => $this['is_open'],
            'product' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
