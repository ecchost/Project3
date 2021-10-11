<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
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
            'user' => UserResource::make($this->whenLoaded('user')),
            'is_filled' => $this['is_filled'],
            'items' => WishlistItemResource::collection($this->whenLoaded('items'))
        ];
    }
}
