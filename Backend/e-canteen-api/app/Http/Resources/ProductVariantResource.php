<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
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
            'variant' => VariantResource::make($this->whenLoaded('variant')),
            'value' => $this['value'],
            'stock' => $this['stock'],
            'price' => $this['price'],
            'product' => ProductResource::make($this->whenLoaded('product')),
        ];
    }
}
