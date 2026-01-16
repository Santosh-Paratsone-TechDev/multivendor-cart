<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'name' => fake()->word(),
            'price' => fake()->numberBetween(100, 5000),
            'stock' => fake()->numberBetween(5, 50),
            'vendor_id' => \App\Models\User::where('role', 'vendor')->inRandomOrder()->first()->id,
        ];
    }
}
