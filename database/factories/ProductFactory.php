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

     protected static function newFactory()
     {
            return ProductFactory::new();
     }
    public function definition(): array
    {
        return [
            "ProductName" => fake()->company(),
            "ProductPrice" => fake()->jobTitle(),
            "ProductImage" => fake()->image(),
            "ProductImage" => fake()->imageUrl(),
            "CategoryId" => random_int(1,5)
        ];
    }
}
