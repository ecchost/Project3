<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
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
            'name' => $this['name'],
            'code' => $this['code'],
            'category' => $this['category'],
            'image' => $this['image'],
            'is_active' => $this['is_active'],
            'is_enable' => $this['is_enable'],
            'gateway' => $this['gateway'],
            'account_holder' => $this['account_holder'],
            'account_number' => $this['account_number']
        ];
    }
}
