<?php

namespace Database\Factories;

use App\Enums\PaymentMethodCategory;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'code' => $this->faker->creditCardType(),
            'category' => $this->faker->randomElement(PaymentMethodCategory::getValues()),
            'image' => $this->faker->imageUrl(),
            'gateway' => $this->faker->word(),
        ];
    }
}
