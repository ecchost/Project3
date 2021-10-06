<?php

namespace Database\Factories;

use App\Enums\PaymentStatusEnum;
use App\Models\Checkout;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'checkout_id' => Checkout::all()->random()->all(),
            'payment_method' => PaymentMethod::all()->random()->all(),
            'status' => $this->faker->randomElement(PaymentStatusEnum::getValues()),
            'amount' => $this->faker->randomDigitNotZero(),
            'paid_at' => $this->faker->dateTimeThisMonth(),
            'bank_account' => $this->faker->creditCardNumber(),
        ];
    }
}
