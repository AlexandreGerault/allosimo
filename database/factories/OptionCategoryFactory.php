<?php

namespace Database\Factories;

use App\Models\OptionCategory;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionCategoryFactory extends Factory
{
    protected $model = OptionCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'restaurant_id' => Restaurant::factory()->create()->id
        ];
    }
}
