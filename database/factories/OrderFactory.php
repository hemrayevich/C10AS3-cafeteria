<?php

namespace Database\Factories;

use App\Models\Cafeteria;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $userId = User::inRandomOrder()->first()?->id;
        $cafeteriaId = Cafeteria::inRandomOrder()->first()?->id;

        $status = ['pending', 'processing', 'completed', 'cancelled'];

        $paymentMethod = ['card', 'cash'];

        return [
            'user_id'        => $userId,
            'cafeteria_id'   => $cafeteriaId,
            'total_price'    => fake()->randomFloat(2, 5, 1000),
            'status'         => fake()->randomElement($status),
            'payment_method' => fake()->randomElement($paymentMethod),
            'note'           => fake()->boolean(30) ? fake()->sentence() : null,
        ];
    }
}
