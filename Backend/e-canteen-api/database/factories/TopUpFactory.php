<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use App\Models\TopUp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopUpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TopUp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'payment_id' => PaymentMethod::all()->random()->id,
            'amount' => $this->faker->randomDigitNotZero(),
            'proof' => $this->faker->image(),
        ];
    }
}
