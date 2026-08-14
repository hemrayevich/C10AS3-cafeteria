<?php

namespace Database\Factories;

use App\Models\Drink;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $orderId = Order::inRandomOrder()->first()->id;
        $drinkId = Drink::inRandomOrder()->first()->id;

        return [
            'order_id' => $orderId,
            'drink_id' => $drinkId,
            'quantity' => fake()->numberBetween(1, 5),
            'price'    => fake()->randomFloat(2, 5, 100),
        ];
    }
}
