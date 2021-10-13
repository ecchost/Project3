<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this['total_ratings']->count() !== 0){
            return [
                'id' => $this['id'],
                'category' => CategoryResource::make($this->whenLoaded('category')),
                'shop' => ShopResource::make($this->whenLoaded('shop')),
                'name' => $this['name'],
                'slug' => $this['slug'],
                'price' => $this['price'],
                'stock' => $this['stock'],
                'image' => $this['image'],
                'ratings' => (($this['total_ratings']->sum()) / $this['total_ratings']->count()) ,
                'availability' => $this['availability'],
                'description' => $this['description'],
                'review' => ReviewResource::collection($this->whenLoaded('reviews'))
            ];
        }else{
            return [
                'id' => $this['id'],
                'category' => CategoryResource::make($this->whenLoaded('category')),
                'shop' => ShopResource::make($this->whenLoaded('shop')),
                'name' => $this['name'],
                'slug' => $this['slug'],
                'price' => $this['price'],
                'stock' => $this['stock'],
                'image' => $this['image'],
                'ratings' => 'Not Rated Yet',
                'availability' => $this['availability'],
                'description' => $this['description'],
                'review' => ReviewResource::collection($this->whenLoaded('reviews'))
            ];
        }
    }
}
