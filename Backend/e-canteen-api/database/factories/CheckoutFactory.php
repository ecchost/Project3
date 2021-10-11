<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Checkout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'order_status' => $this->faker->randomElement(OrderStatusEnum::getValues()),
        ];
    }
}
