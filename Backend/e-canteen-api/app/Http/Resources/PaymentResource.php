<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'checkout' => CheckoutResource::make($this->whenLoaded('checkout')),
            'method' => PaymentMethodResource::make($this->whenLoaded('method')),
            'status' => $this['status'],
            'amount' => $this['amount'],
            'paid_at' => $this['paid_at'],
            'bank_account' => $this['bank_account']
        ];
    }
}
