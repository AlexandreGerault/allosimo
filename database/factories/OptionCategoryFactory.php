<?php

namespace Database\Factories;

use App\Models\OptionCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionCategoryFactory extends Factory
{
    protected $model = OptionCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
