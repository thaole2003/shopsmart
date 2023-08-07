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
            //
            'name' => fake()->name(),
            'sku' => fake()->text(5),
            'price' => fake()->randomFloat(2, 10, 1000),
            'describe' => fake()->text(100),
            'image' => 'https://images.pexels.com/photos/14384723/pexels-photo-14384723.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load',
        ];
    }
}
