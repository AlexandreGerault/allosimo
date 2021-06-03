<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    protected $model = Restaurant::class;

    public function definition(): array
    {
        return [
            'name'        => $this->faker->name,
            'description' => $this->faker->text,
            'town'        => $this->faker->city,
            'stars'       => $this->faker->numberBetween(0, 10)
        ];
    }
}
