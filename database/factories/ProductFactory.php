<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'RefPdt' => $this->faker->unique()->randomNumber(5),
            'libPdt' => $this->faker->word,
            'prix' => $this->faker->randomFloat(2, 10, 100),
            'Qte' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement(['Electronics', 'Clothing', 'Books']),
        ];
    }
}
