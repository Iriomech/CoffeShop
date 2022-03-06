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
    public function definition()
    {
       //Coffe Factory
        return [
            'name' => $this->faker->randomElement(['Cappuccino', 'Latte', 'Espresso', 'Americano', 'Mocha', 'Cafe au lait', 'Cafe Mocha', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Americano', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte', 'Cafe Mocha Espresso', 'Cafe Mocha Cappuccino', 'Cafe Mocha Latte']),
            'price' => $this->faker->randomFloat(2, 1, 6),
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(400, 400),
            'status' => $this->faker->randomElement(['available', 'unavailable']),           
        ];
    }
}
