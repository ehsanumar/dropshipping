<?php

namespace Database\Factories;

use App\Models\{Brand,Product, Category};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_category>
 */
class Product_categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'product_id' => Product::all()->random()->id,
        ];
    }
}
