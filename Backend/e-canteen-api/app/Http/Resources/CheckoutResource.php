<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this['id'],
            'user' => UserResource::make($this->whenLoaded('user')),
            'items' => CheckoutItemResource::collection($this->whenLoaded('items')),
            'order_status' => $this['order_status'],
            'confirmed_at' => $this['confirmed_at'],
            'accepted_at' => $this['accepted_at'],
            'cancelled_at' => $this['cancelled_at'],
            'cancel_reason' => $this['cancel_reason'],
        ];
    }
}
