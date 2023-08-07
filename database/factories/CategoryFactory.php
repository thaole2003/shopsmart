<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'image' => 'https://images.pexels.com/photos/15134001/pexels-photo-15134001.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load',
        ];
    }
}
