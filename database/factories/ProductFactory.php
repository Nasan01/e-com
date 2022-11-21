<?php

namespace Database\Factories;

use App\Models\Category;
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
        $defaultIllustration = ["default1", "default2", "default3"];

        return [
            'name' => fake()->words(3, true),
            'illustration' => $defaultIllustration[random_int(0, 2)],
            'description' => fake()->sentences(4, true),
            'price' => fake()->numberBetween(5000, 1000000),
            'unit' => 'Ar',
            'category_id' => Category::all()->random(),
        ];
    }
}
