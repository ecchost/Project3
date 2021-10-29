<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreShop extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => [
              'required' , 'unique:users',
              Rule::exists('users', 'id')->where(function ($query){
                  return $query->where('role','merchant');
              })
            ],
            'location_id' => 'required|exists:shop_addresses,id',
            'name' => 'required|unique:shops',
            'image' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'user_id.exists' => 'User must be Merchant Role' ,
        ];
    }
}
