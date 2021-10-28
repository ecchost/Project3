<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SKUResource extends JsonResource
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
            'minimum_order' => $this['minimum_order'],
            'total_stock' => $this['total_stock'],
            'is_available' => $this['is_available']
        ];
    }
}
