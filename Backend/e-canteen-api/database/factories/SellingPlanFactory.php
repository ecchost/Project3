<?php

namespace Database\Factories;

use App\Enums\ProductSellStatus;
use App\Models\Product;
use App\Models\SellingPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellingPlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SellingPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::all()->random()->id,
            'price' => $this->faker->randomDigitNotZero(),
            'stock' => $this->faker->randomDigitNotZero(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(ProductSellStatus::getValues()),
            'is_active' => $this->faker->boolean(),
            'start' => $this->faker->dateTimeThisMonth(),
            'finish' => $this->faker->dateTimeBetween('now', '1 month'),
        ];
    }
}
