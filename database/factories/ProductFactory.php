<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
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
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->paragraph(3),
            'image' => fake()->imageUrl(),
            'price' => fake()->numberBetween(10,5000),
            'quantity' => fake()->numberBetween(10,50),
            'user_id' => User::all()->random()->id,
                ];
    }
}
