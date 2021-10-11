<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this['id'],
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'shop' => ShopResource::make($this->whenLoaded('shop')),
            'name' => $this['name'],
            'slug' => $this['slug'],
            'price' => $this['price'],
            'stock' => $this['stock'],
            'image' => $this['image'],
            'availability' => $this['availability'],
            'description' => $this['description'],
        ];
    }
}
