<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SKU;
use Illuminate\Database\Eloquent\Factories\Factory;

class SKUFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SKU::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::all()->random()->id,
            'minimum_order' => $this->faker->randomDigitNotZero(),
            'stock' => $this->faker->randomDigitNotZero(),
        ];
    }
}
