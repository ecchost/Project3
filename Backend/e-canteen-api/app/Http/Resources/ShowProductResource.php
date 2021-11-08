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
                'stock' => $this['stock'],
                'image' => $this['image'],
                'variant' => ProductVariantResource::collection($this->whenLoaded('variants')),
                'ratings' => round(($this['total_ratings']->sum()) / $this['total_ratings']->count(), 2),
                'description' => $this['description'],
                'review' => ReviewResource::collection($this->whenLoaded('reviews')),
                'sku' => SKUResource::collection($this->whenLoaded('skus')) ,
                'selling_plan' => SellingPlanResource::collection($this->whenLoaded('sellPlans'))
            ];
        }else{
            return [
                'id' => $this['id'],
                'category' => CategoryResource::make($this->whenLoaded('category')),
                'shop' => ShopResource::make($this->whenLoaded('shop')),
                'name' => $this['name'],
                'slug' => $this['slug'],
                'stock' => $this['stock'],
                'image' => $this['image'],
                'variant' => ProductVariantResource::collection($this->whenLoaded('variants')),
                'ratings' => null,
                'description' => $this['description'],
                'review' => ReviewResource::collection($this->whenLoaded('reviews')),
                'sku' => SKUResource::collection($this->whenLoaded('skus')) ,
                'selling_plan' => SellingPlanResource::collection($this->whenLoaded('sellPlans'))
            ];
        }
    }
}
