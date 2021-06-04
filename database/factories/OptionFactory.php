<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\OptionCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    protected $model = Option::class;

    public function definition(): array
    {
        return [
            'name'               => $this->faker->name,
            'price'              => $this->faker->numberBetween(0, 100),
            'option_category_id' => OptionCategory::factory()->create()->id
        ];
    }
}
