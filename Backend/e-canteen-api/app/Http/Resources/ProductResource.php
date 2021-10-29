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
        if ($this['total_ratings']->count() !== 0){
            return [
                'id' => $this['id'],
                'category' => CategoryResource::make($this->whenLoaded('category')),
                'shop' => ShopResource::make($this->whenLoaded('shop')),
                'name' => $this['name'],
                'slug' => $this['slug'],
                'variant' => ProductVariantResource::collection($this->whenLoaded('variants')),
                'price' => $this['price'],
                'image' => $this['image'],
                'rating_count' => $this['total_ratings']->count(),
                'total_ratings' => round(($this['total_ratings']->sum()) / $this['total_ratings']->count(), 2),
                'sku' => SKUResource::collection($this->whenLoaded('skus')) ,
                'description' => $this['description'],
                'selling_plan' => SellingPlanResource::collection($this->whenLoaded('sellPlans')),

            ];
        }else{
            return [
                'id' => $this['id'],
                'category' => CategoryResource::make($this->whenLoaded('category')),
                'shop' => ShopResource::make($this->whenLoaded('shop')),
                'name' => $this['name'],
                'slug' => $this['slug'],
                'variant' => ProductVariantResource::collection($this->whenLoaded('variants')),
                'price' => $this['price'],
                'image' => $this['image'],
                'total_ratings' => null,
                'sku' => SKUResource::collection($this->whenLoaded('skus')) ,
                'description' => $this['description'],
                'selling_plan' => SellingPlanResource::collection($this->whenLoaded('sellPlans'))
            ];
        }
    }
}
