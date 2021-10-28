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
            'price' => $this->faker->randomDigitNotNull(),
            'status' => $this->faker->randomElement(ProductSellStatus::getValues()),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
