<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'name' => $this->faker ->sentence(),
            'description' => $this->faker -> paragraph(),
            'price' => $this->faker -> numberBetween($min = 1, $max = 1000),
            'state' => $this->faker -> numberBetween($min = 1, $max = 2),
            'isVisible' => $this->faker -> numberBetween($min = 1, $max = 2),
            'reference' => Str::random(16),
        ];
    }
}
