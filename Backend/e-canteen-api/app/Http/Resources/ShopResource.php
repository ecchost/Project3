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
        if ($this['rating_count']->sum() !== 0) {
            return [
                'id' => $this['id'],
                'name' => $this['name'],
                'slug' => $this['slug'],
                'location' => ShopAddressResource::make($this->whenLoaded('location')),
                'food_category' => $this['food_category'],
                'rating_count' => $this['rating_count']->sum(),
                'shop_rating' => round($this['shop_rating']->sum() / $this['rating_count']->sum(),2),
                'image' => $this['image'],
                'is_open' => $this['is_open'],
            ];
        }else{
            return [
                'id' => $this['id'],
                'name' => $this['name'],
                'slug' => $this['slug'],
                'location' => ShopAddressResource::make($this->whenLoaded('location')),
                'food_category' => $this['food_category'],
                'rating_count' => null,
                'shop_rating' => null,
                'image' => $this['image'],
                'is_open' => $this['is_open'],
            ];
        }
    }
}
