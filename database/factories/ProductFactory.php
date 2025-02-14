<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
        $stock = $this->faker->numberBetween(1, 100);
        return [
            //
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 1, 100000),
            'stock' => $stock,
            'stock_initial' => $stock,
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean(),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
