<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Models\Checkout;
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
            'order_status' => $this->faker->randomElement(OrderStatusEnum::getValues()),
        ];
    }
}
