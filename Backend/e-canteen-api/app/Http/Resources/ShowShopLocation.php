<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowShopLocation extends JsonResource
{

    public function toArray($request)
    {
        return [
            'shop' => ShopResource::collection($this->whenLoaded('shops')),
            'floor' => $this['floor'],
            'specific_location' => $this['specific_location']
        ];
    }
}
