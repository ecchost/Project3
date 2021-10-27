<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShop extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->route('shop')->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|unique:shops',
            'image' => 'nullable',
            'is_open' => 'nullable|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $shop = $this->route('shop');

//        if (!$shop['is_open'] === true){
            $this->merge([
                'user_id' => 'nullable|exist:users,id',
                'location_id' => 'nullable|exist:shop_addresses,id',
                'slug' => 'nullable',
            ]);
//        }
    }
}
