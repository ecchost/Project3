<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\ShopAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'building_id' => Building::all()->random()->id,
            'floor' => $this->faker->randomDigitNotZero(),
            'specific_location' => $this->faker->sentence(),
        ];
    }
}
