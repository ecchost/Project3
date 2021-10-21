<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\ShopAddress;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'location_id' => ShopAddress::all()->random()->id,
            'image' => $this->faker->imageUrl(),
            'is_open' => $this->faker->boolean()
        ];
    }
}
