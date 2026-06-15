<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1,2),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'description' => $this->faker->text(),
            'img' => fake()->randomElement([
                'https://images.unsplash.com/photo-1623341214825-9f4f963727da',
                'https://images.unsplash.com/photo-1516100882582-96c3a05fe590',
                'https://images.unsplash.com/photo-1546173159-315724a31696',
            ]),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
